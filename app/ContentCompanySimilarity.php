<?php declare(strict_types=1);

namespace App;

use Exception;
use Illuminate\Support\Facades\Auth;
use App\Company;

class ContentCompanySimilarity
{
    protected $featureWeight = 1;

    public function __construct()
    {

    }

    

    public function calculateContentSimilarity(): array
    {
        $array = [];
        $companies = Company::all();
        foreach ($companies as $company) {
            $array[$company->id] = $this->calculateCompanyContentSimilarityScore(Auth::user(), $company);
        }
        // $array[$product->id] = $similarityScores;
        arsort($array);
        return $array;
    }

   
    protected function calculateCompanyContentSimilarityScore($user, $company)
    {
        // dd($company->features);
        $userTags = implode('', get_object_vars((object)$user->features));
        $companyTags = implode('', get_object_vars((object)$company->features));

        return array_sum([
            // features similarity
            (Similarity::hamming($userTags, $companyTags) * $this->featureWeight),
            
            // Category similarity
            // (Similarity::jaccard_company((array)$companyA->followers_id, (array)$companyB->followers_id) * $this->followersWeight)
        ])/ ($this->featureWeight);
    }


}
