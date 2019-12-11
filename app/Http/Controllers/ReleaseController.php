<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Grade;
use App\Release;
use App\Tag;
use App\Enums\ReleaseStatus;
use App\User;
use Auth;
use Illuminate\Support\Facades\Storage;
use App\ReleaseSimilarity;

class ReleaseController extends Controller
{

    protected function get_recommend($currentrelease){
        $releases = Release::all()->toJSON();
        $releases        = json_decode($releases);
        $selectedId      = intval($currentrelease->id);
        $selectedRelease = $releases[0];

        $selectedReleases = array_filter($releases, function ($release) use ($selectedId) { return $release->id === $selectedId; });
        
        if (count($selectedReleases)) {
            $selectedRelease = $selectedReleases[array_keys($selectedReleases)[0]];
            // dd($selectedRelease);
        }

        $releaseSimilarity = new ReleaseSimilarity($releases);
        $similarityMatrix  = $releaseSimilarity->calculateSimilarityMatrix();
        
        $releases   = $releaseSimilarity->getProductsSortedBySimularity($selectedId, $similarityMatrix);
        $releases_id = array_column($releases, 'id');
        return $releases_id = array_slice($releases_id, 0, 5);
    }

    public function show($slug){
        $release = Release::where('slug', '=', $slug)->first();
        
        $similar_releases_ids = $this->get_recommend($release);
        $similar_releases = Release::whereIn('id', $similar_releases_ids)->get();

        $visitor = null;
        if(Auth::check()){ 
            $visitor = Auth::user()->id;
            views($release)->overrideVisitor($visitor)->delayInSession(30)->record();
        }
        else views($release)->delayInSession(30)->record();
            
        return view('ririsu.show', ['release' => $release, 'similar_releases' => $similar_releases]);
    }

    public function create()
    {
        $categories = Category::all();
        $grades = Grade::all();
        $tags = Tag::get()->pluck('title', 'id');
        $temp_tags = NULL;
        return view('articles.create', ['temp_tags'=>  $temp_tags,  'categories' => $categories, 'grades' => $grades, 'tags' => $tags]);
    }

    public function drafts(){
        $releasesQuery = Release::editing();
        if(Gate::denies('release.draft')) {
            $releasesQuery = $releasesQuery->where('user_id', Auth::user()->id);
        }
        $releases = $releasesQuery->paginate();
        return view('drafts', compact('releases'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'category_ref' => 'required',
            'grade_ref' => 'required',
        ]);
        $article = new Release();
        $article->title = $request->title;
        $article->url_video = $request->url_video;
        $article->category_ref = $request->category_ref;
        $article->grade_ref = $request->grade_ref;
        $article->slug = uniqid();
        if($request->user()->role != "ADMIN"){
            $article->status = ReleaseStatus::Editing;
        }else{
            $article->status = true;
        }

        //image in desc upload
        $desc = $request->input('description');
        $dom = new \DomDocument();
        $dom->loadHtml(mb_convert_encoding($desc, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
        $images = $dom->getElementsByTagName('img');
        foreach($images as $k => $img){
            $data = $img->getAttribute('src');
            if(strpos($data, 'https') && strpos($data, 'https') == false )
            {
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $data = base64_decode($data);
                $image_name= "/desc/" . time().$k.'.png';
                Storage::disk('s3')->put($image_name, $data);
                $img->removeAttribute('src');
                $img->setAttribute('src', Storage::disk('s3')->url($image_name));
            }
        }

        $desc = $dom->saveHTML();
        $article->description = $desc;

        //thumbnail upload
        $img = $request->file('image');
        $strFlash = 'Article Created';
        $strStatus = 'success';
        if ($img != null) {
            if ($img->getError() == 0) {
                $file_name = time() . '_' . $img->getClientOriginalName();
                Storage::disk('s3')->put($file_name, \File::get($img));
                $article->image = Storage::disk('s3')->url($file_name);
            } elseif($img->getError() == 1) {
                $strFlash = $img->getErrorMessage();
                $strStatus = 'warning';
            }
        }else{
            $article->image = null;
        }
        $article->user_id = $request->user()->id;
        $article->save();
        $tags_array = (array)$request->input('tag');
        
        for($i = 0; $i<count($tags_array);$i++){
            if(strpos($tags_array[$i],'@/new')){
                $tags_array[$i]     = str_replace('@/new','', $tags_array[$i]);
                $new_tag = new Tag();
                $new_tag->title = $tags_array[$i];
                $new_tag->save();
                $tags_array[$i] = $new_tag->id;
            }
        }
        $article->tags()->sync($tags_array);

        return redirect(route('my_account'));
    }
}
