<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Release;
use App\Tag;
use Illuminate\Support\Facades\Redis;

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
        Redis::set('name', 'Taylor');
        $values = Redis::get('name');
        dd($values);
        return view('home');
    }

    public function about(){
        return view('about');
    }
    
}
