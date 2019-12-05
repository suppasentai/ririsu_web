<?php declare(strict_types=1);

namespace App;

use Exception;

class ReleaseSimilarity
{
    protected $products       = [];
    protected $featureWeight  = 1;
    protected $publishedWeight  = 1;
    protected $categoryWeight = 1;
    protected $industryWeight = 1;
    protected $stockWeight = 1;
    protected $followersWeight = 1;
    protected $publishedHighRange = 1000;
    protected $stockHighRange = 1000;
    protected $kneighbors = 5;
    protected $type = null;

    public function __construct(array $products, string $type = null)
    {
        $this->products  = $products;
        $this->type = $type;
        if($type == 'companies')
        $this->stockHighRange = max(array_column($products, 'capital_stock'));
        else
        $this->publishedHighRange = max(array_column($products, 'published'));
    }

    public function setFeatureWeight(float $weight): void
    {
        $this->featureWeight = $weight;
    }

    public function setPublishedWeight(float $weight): void
    {
        $this->publishedWeight = $weight;
    }

    public function setCategoryWeight(float $weight): void
    {
        $this->categoryWeight = $weight;
    }

    public function setIndustryWeight(float $weight): void
    {
        $this->categoryWeight = $weight;
    }

    public function calculateSimilarityMatrix(): array
    {
        $matrix = [];

        foreach ($this->products as $product) {

            $similarityScores = [];

            foreach ($this->products as $_product) {
                if ($product->id === $_product->id) {
                    continue;
                }
                if($this->type == 'companies')
                    $similarityScores['product_id_' . $_product->id] = $this->calculateCompanySimilarityScore($product, $_product);
                else
                    $similarityScores['product_id_' . $_product->id] = $this->calculateSimilarityScore($product, $_product);
            }
            $matrix['product_id_' . $product->id] = $similarityScores;
        }
        return $matrix;
    }

    public function calculatePredictMatrix(): array
    {
        $similarityMatrix  = $this->calculateSimilarityMatrix();
        // dd($similarityMatrix);
        $matrix = [];
        foreach($this->products as $product) {

            $predictScores = [];

            // dd((array)$product->followers_id);
            $arr_user = (array)$product->followers_id;
            // dd($arr_user);
            dd($this->products);
            foreach($arr_user as $id => $status){
                $followedcompanies_simi = [];
                 
                if ($status != 0) {
                    $predictScores[$id] = 1;
                   continue;
                }
                else {
                    $predictScores[$id] = 0;
                    foreach($this->products as $_product){
                        if ($product->id === $_product->id) {
                            continue;
                        }
                        $_arr_user = (array)$_product->followers_id;
                        if($_arr_user[$id] != 0) {
                            $followedcompanies_simi[$_product->id] = $similarityMatrix['product_id_' . $product->id]['product_id_' . $_product->id];
                        }
                    }
                    if($followedcompanies_simi){
                        // dd($followedcompanies_simi);
                        arsort($followedcompanies_simi);
                        // dd($followedcompanies);
                        $knearest = array_slice($followedcompanies_simi, 0, $this->kneighbors, true);
                        // dd($knearest);
                        // dd($followedcompanies);
                        

                        if($knearest)
                        {
                            // dd($knearest);
                            
                            $numerator = 0;
                            $denominator = 0;
                            foreach($knearest as $company_id => $value){
                                $blehs = array_filter($this->products, function ($product) use ($company_id) { return $product->id == $company_id; });
                                
                                $bleh = $blehs[array_keys($blehs)[0]];
                                // dd($bleh);
                                // dd(((array)$product->followers_id)[$id]);
                                $numerator += ((array)$bleh->followers_id)[$id]*$value;
                                // dd($value);
                                $denominator ++;
                            }
                            // dd($denominator);

                            $predictScores[$id] = $numerator/$denominator;

                        }
                    }
                }
            }
            $matrix[$product->id] = $predictScores;
            
        }
        return $matrix;
    }

    public function getProductsSortedBySimularity(int $productId, array $matrix): array
    {
        $similarities   = $matrix['product_id_' . $productId] ?? null;
        $sortedProducts = [];

        if (is_null($similarities)) {
            throw new Exception('Can\'t find product with that ID.');
        }
        arsort($similarities);

        foreach ($similarities as $productIdKey => $similarity) {
            $id      = intval(str_replace('product_id_', '', $productIdKey));
            // dd($this->releases);
            $products = array_filter($this->products, function ($product) use ($id) { return $product->id === $id; });
            if (! count($products)) {
                continue;
            }
            // dd($products);
            $product = $products[array_keys($products)[0]];
            // dd($product);
            $product->similarity = $similarity;
            $sortedProducts[] = $product;
        }
        return $sortedProducts;
    }

    protected function calculateSimilarityScore($releaseA, $releaseB)
    {
        $releaseAFeatures = implode('', get_object_vars($releaseA->features));
        $releaseBFeatures = implode('', get_object_vars($releaseB->features));

        return array_sum([
            // features similarity
            (Similarity::hamming($releaseAFeatures, $releaseBFeatures) * $this->featureWeight),

            // date similarity
            (Similarity::euclidean(
                Similarity::minMaxNorm([$releaseA->published], 0, $this->publishedHighRange),
                Similarity::minMaxNorm([$releaseB->published], 0, $this->publishedHighRange)
            ) * $this->publishedWeight),
            
            // Category similarity
            (Similarity::jaccard(array($releaseA->category_ref), array($releaseB->category_ref)) * $this->categoryWeight)
        ]) / ($this->featureWeight + $this->categoryWeight + $this->publishedWeight);
    }

    protected function calculateCompanySimilarityScore($companyA, $companyB)
    {
        return array_sum([
            // features similarity
            // (Similarity::hamming($releaseAFeatures, $releaseBFeatures) * $this->featureWeight),

            // date similarity
            (Similarity::euclidean(
                Similarity::minMaxNorm([$companyA->capital_stock*0.1, $companyA->employees_number*1000], 0, $this->publishedHighRange),
                Similarity::minMaxNorm([$companyB->capital_stock*0.1, $companyB->employees_number*1000], 0, $this->publishedHighRange)
            ) * $this->publishedWeight),
            
            // Category similarity
            (Similarity::jaccard((array)$companyA->followers_id, (array)$companyB->followers_id) * $this->followersWeight)
        ])/ ($this->stockWeight + $this->followersWeight);
    }
}
