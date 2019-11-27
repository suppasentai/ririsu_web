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

    public function __construct(){
        
    } 


    public function index()
    {
        // dd(Release::featured());
        $tags = Tag::all();
        return view('home');
    }

    public function about(){
        return view('about');
    }
    
}
