<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Release;
use App\Tag;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $top_news = Release::orderBy('created_at', 'desc')->take(15)->get();
        $featured_news = Release::orderBy('created_at', 'desc')->paginate(5);
        $tags = Tag::all();
        return view('home', ['top_news' => $top_news, 'featured_news' => $featured_news]);
    }

    public function about(){
        return view('about');
    }
    
}
