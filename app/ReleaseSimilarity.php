<?php declare(strict_types=1);

namespace App;

use Exception;

class ReleaseSimilarity
{
    protected $releases       = [];
    protected $featureWeight  = 1;
    protected $publishedWeight  = 1;
    protected $categoryWeight = 1;
    protected $publishedHighRange = 1000000;

    public function __construct(array $releases)
    {
        $this->releases       = $releases;
        $this->publishedHighRange = max(array_column($releases, 'published'));
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

    public function calculateSimilarityMatrix(): array
    {
        $matrix = [];

        foreach ($this->releases as $release) {

            $similarityScores = [];

            foreach ($this->releases as $_release) {
                if ($release->id === $_release->id) {
                    continue;
                }
                $similarityScores['release_id_' . $_release->id] = $this->calculateSimilarityScore($release, $_release);
            }
            $matrix['release_id_' . $release->id] = $similarityScores;
        }
        return $matrix;
    }

    public function getReleasesSortedBySimularity(int $releaseId, array $matrix): array
    {
        $similarities   = $matrix['release_id_' . $releaseId] ?? null;
        $sortedReleases = [];

        if (is_null($similarities)) {
            throw new Exception('Can\'t find release with that ID.');
        }
        arsort($similarities);

        foreach ($similarities as $releaseIdKey => $similarity) {
            $id      = intval(str_replace('release_id_', '', $releaseIdKey));
            // dd($this->releases);
            $releases = array_filter($this->releases, function ($release) use ($id) { return $release->id === $id; });
            if (! count($releases)) {
                continue;
            }
            // dd($releases);
            $release = $releases[array_keys($releases)[0]];
            // dd($release);
            $release->similarity = $similarity;
            $sortedReleases[] = $release;
        }
        return $sortedReleases;
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
}
