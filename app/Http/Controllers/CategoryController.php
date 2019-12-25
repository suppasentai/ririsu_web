<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    //
    public function index(){
        return view('');
    }

    public function show($id){
        $category = Category::where('id', '=', $id)->first();  
        // dd($category);
        return view('categories.show', ['category' => $category, 'releases' => $category->releases()->paginate(6)]);
    }
}
