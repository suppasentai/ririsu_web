<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Grade;
use App\Institution;
use App\Release;
use Illuminate\Support\Facades\Storage;

class ReleaseController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        $grades = Grade::all();
        $institutions = Institution::all();
        return view('articles.create', ['categories' => $categories, 'grades' => $grades, 'institutions' => $institutions]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required',
        ]);
        $article = new Release();
        $article->title = $request->title;
        $article->description = $request->description;
        $article->url_video = $request->url_video;
        $article->category_ref = $request->category_ref;
        $article->grade_ref = $request->grade_ref;
        $article->institution_ref = $request->institution_ref;
        if($request->user()->role != "ADMIN"){
            $article->active = false;
        }else{
            $article->active = true;
        }
        $img = $request->file('image');
        $strFlash = 'Article Created';
        $strStatus = 'success';
        if ($img != null) {
            if ($img->getError() == 0) {
                $file_route = time() . '_' . $img->getClientOriginalName();
                Storage::disk('s3')->put($file_route, \File::get($img));
                $article->image = Storage::disk('s3')->url($file_route);
            } elseif($img->getError() == 1) {
                $strFlash = $img->getErrorMessage();
                $strStatus = 'warning';
            }
        }else{
            $article->image = null;
        }
        $article->user_id = $request->user()->id;
        $article->save();
        return redirect(route('my_account'));
    }
}
