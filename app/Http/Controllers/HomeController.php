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
        // $data = [
        //     'body' => [
        //         'testField' => 'abc'
        //     ],
        //     'index' => 'my_index',
        //     'type' => 'my_type',
        //     'id' => 'my_id',
        // ];
        // $return = $this->elastic->index($data);
        // $response =  $this->elastic->nodes()->stats();
        // dd($response);
        //dd(phpinfo());
        return view('home');
    }

    public function about(){
        return view('about');
    }
    
}
