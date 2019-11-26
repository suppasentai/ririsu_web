<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReleaseSimilarity;
use App\Release;

class RecommendController extends Controller
{
    public function test(){
        // $test = Release::all();
        // dd($test);
        // $releases        = json_decode(file_get_contents(storage_path('data/products-data.json')));
        // $user = Tag::find(1);

        // dd($user->toJson());
        $releases = Release::all()->toJSON();
        $releases        = json_decode($releases);
        $selectedId      = intval(app('request')->input('id') ?? '8');
        $selectedRelease = $releases[0];

        $selectedReleases = array_filter($releases, function ($release) use ($selectedId) { return $release->id === $selectedId; });
        
        if (count($selectedReleases)) {
            $selectedRelease = $selectedReleases[array_keys($selectedReleases)[0]];
            // dd($selectedRelease);
        }

        $releaseSimilarity = new ReleaseSimilarity($releases);
        $similarityMatrix  = $releaseSimilarity->calculateSimilarityMatrix();
        $releases          = $releaseSimilarity->getReleasesSortedBySimularity($selectedId, $similarityMatrix);
        return view('recomtest', compact('selectedId', 'selectedRelease', 'releases'));
    }
}
