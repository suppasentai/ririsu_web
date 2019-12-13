<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReleaseSimilarity;
use App\Company;
use App\User;
use Auth;

class RecommendController extends Controller
{
    public function test(){
        $companies = Company::all()->toJSON();
        $companies        = json_decode($companies);
        
        $selectedId      = intval(app('request')->input('id') ?? '105');
        // $selectedRelease = $companies[0];

        // $selectedReleases = array_filter($companies, function ($companies) use ($selectedId) { return $companies->id === $selectedId; });
        
        // if (count($selectedReleases)) {
        //     $selectedRelease = $selectedReleases[array_keys($selectedReleases)[0]];
        //     // dd($selectedRelease);
        // }

        $releaseSimilarity = new ReleaseSimilarity($companies, 'companies');
        $predictMatrix  = $releaseSimilarity->calculatePredictMatrix();
        $predictArray = [];
        foreach($predictMatrix as $id => $company){
            $predictArray[$id] = $company[$selectedId];
            // dd($company);
        }        
        dd($predictMatrix);
        return view('recomtest', compact('selectedId', 'selectedRelease', 'releases'));
    }
}
