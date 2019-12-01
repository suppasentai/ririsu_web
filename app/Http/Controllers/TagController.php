<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Session;

class TagController extends Controller
{
    //
    public function index(){
        $tags = Tag::paginate(10);
        return view('tags.index')->withTags($tags);
    }

    public function store(Request $request){
        $this->validate($request, [
           'title' => 'required|max:255' 
        ]);
        $tag = new Tag();
        $tag->title = $request->title;
        $tag->save();

        Session::flash('success', 'New Tag was successfully created!');

        return redirect()->route('tags.index');
    }
}
