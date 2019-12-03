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
    protected $publishedHighRange = 1000;
    protected $stockHighRange = 1000;
    protected $type = null;

    public function __construct(array $products, string $type = null)
    {
        $this->products       = $products;
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
            // dd($releases);
            $product = $products[array_keys($products)[0]];
            // dd($release);
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
            (Similarity::jaccard($releaseA->category_ref, $releaseB->category_ref) * $this->categoryWeight)
        ]) / ($this->featureWeight + $this->categoryWeight + $this->publishedWeight);
    }

    protected function calculateCompanySimilarityScore($companyA, $companyB)
    {
        // $releaseAFeatures = implode('', get_object_vars($companyA->features));
        // $releaseBFeatures = implode('', get_object_vars($releaseB->features));

        return array_sum([
            // features similarity
            // (Similarity::hamming($releaseAFeatures, $releaseBFeatures) * $this->featureWeight),

            // date similarity
            (Similarity::euclidean(
                Similarity::minMaxNorm([$companyA->capital_stock*0.1, $companyA->employees_number*1000], 0, $this->publishedHighRange),
                Similarity::minMaxNorm([$companyB->capital_stock*0.1, $companyB->employees_number*1000], 0, $this->publishedHighRange)
            ) * $this->publishedWeight),
            
            // Category similarity
            // (Similarity::jaccard($companyA->industry_ref, $companyB->industry_ref) * $this->industryWeight)
        ]);
    }
}
