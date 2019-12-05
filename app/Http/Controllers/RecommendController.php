<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReleaseSimilarity;
use App\Company;
use Auth;

class RecommendController extends Controller
{
    public function test(){
        $companies = Company::all()->toJSON();
        $companies        = json_decode($companies);
        $selectedId      = intval(app('request')->input('id') ?? '8');
        $selectedRelease = $companies[0];

        $selectedReleases = array_filter($companies, function ($companies) use ($selectedId) { return $companies->id === $selectedId; });
        
        if (count($selectedReleases)) {
            $selectedRelease = $selectedReleases[array_keys($selectedReleases)[0]];
            // dd($selectedRelease);
        }

        $releaseSimilarity = new ReleaseSimilarity($companies, 'companies');
        $predictMatrix  = $releaseSimilarity->calculatePredictMatrix();

        dd($predictMatrix);
        return view('recomtest', compact('selectedId', 'selectedRelease', 'releases'));
    }
}
