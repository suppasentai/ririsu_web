<?php declare(strict_types=1);

namespace App;

use Exception;

class CompanySimilarity
{
    protected $companies       = [];
    // protected $featureWeight  = 1;
    // protected $publishedWeight  = 1;
    protected $categoryWeight = 1;
    // protected $publishedHighRange = 1000000;

    public function __construct(array $companies)
    {
        $this->companies       = $companies;
        // $this->publishedHighRange = max(array_column($releases, 'published'));
    }

    // public function setFeatureWeight(float $weight): void
    // {
    //     $this->featureWeight = $weight;
    // }

    // public function setPublishedWeight(float $weight): void
    // {
    //     $this->publishedWeight = $weight;
    // }

    public function setCategoryWeight(float $weight): void
    {
        $this->categoryWeight = $weight;
    }

    public function calculateSimilarityMatrix(): array
    {
        $matrix = [];

        foreach ($this->companies as $company) {

            $similarityScores = [];

            foreach ($this->companies as $_company) {
                if ($company->id === $_company->id) {
                    continue;
                }
                $similarityScores['company_id_' . $_company->id] = $this->calculateSimilarityScore($company, $_company);
            }
            $matrix['company_id_' . $company->id] = $similarityScores;
        }
        return $matrix;
    }

    public function getCompaniesSortedBySimularity(int $companyId, array $matrix): array
    {
        $similarities   = $matrix['company_id_' . $companyId] ?? null;
        $sortedCompanies = [];

        if (is_null($similarities)) {
            throw new Exception('Can\'t find company with that ID.');
        }
        arsort($similarities);

        foreach ($similarities as $companyIdKey => $similarity) {
            $id      = intval(str_replace('release_id_', '', $companyIdKey));
            // dd($this->releases);
            $companies = array_filter($this->companies, function ($company) use ($id) { return $company->id === $id; });
            if (! count($companies)) {
                continue;
            }
            // dd($releases);
            $company = $companies[array_keys($companies)[0]];
            // dd($release);
            $company->similarity = $similarity;
            $sortedCompanies[] = $company;
        }
        return $sortedCompanies;
    }

    protected function calculateCompanySimilarityScore($companyA, $companyB)
    {
        // $releaseAFeatures = implode('', get_object_vars($companyA->features));
        // $releaseBFeatures = implode('', get_object_vars($releaseB->features));

        return array_sum([
            // features similarity
            // (Similarity::hamming($releaseAFeatures, $releaseBFeatures) * $this->featureWeight),

            // date similarity
            // (Similarity::euclidean(
            //     Similarity::minMaxNorm([$releaseA->published], 0, $this->publishedHighRange),
            //     Similarity::minMaxNorm([$releaseB->published], 0, $this->publishedHighRange)
            // ) * $this->publishedWeight),
            
            // Category similarity
            (Similarity::jaccard($companyA->industry_ref, $companyB->industry_ref) * $this->industryWeight)
        ]);
    }
}
