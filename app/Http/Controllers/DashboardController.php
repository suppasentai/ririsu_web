<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Grade;
use App\Release;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Enums\ReleaseStatus;

class DashboardController extends Controller
{
    protected $pagination = 5;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect(route('welcome'));
    }

    public function articlesFormStatus(){
        $articles = Release::orderBy('created_at', 'desc')->paginate($this->pagination);
        return view('articles.form_status', ['articles' => $articles]);
    }

    public function articlesChangeStatus(Request $request, Release $article){
        if($article->status == ReleaseStatus::Pending)
        {
            $article->status = ReleaseStatus::Released;
        }
        else
        {
            $article->status = ReleaseStatus::Pending;
        }

        $article->save();
        return response()->json($article->status);
    }
}
