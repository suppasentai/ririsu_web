<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\User;
use App\Tag;
use Validator;
use Illuminate\Support\Facades\Hash;
use App\Mail\CompanyVerifyEmail;
use Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use App\ReleaseSimilarity;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function followedCompanies(){
        $companies = Auth::user()->followings(Company::class)->get();
        return view('companies.followed', ['companies' => $companies]);
    }

    protected function get_recommend($currentrelease){

        $companies = Company::all()->toJSON();
        $companies        = json_decode($companies);
        // dd($companies);
        
        // $selectedId      = intval(app('request')->input('id') ?? '105');

        $recomCompanySimilarity = new ReleaseSimilarity($companies, 'companies');
        $recomCompanies = $recomCompanySimilarity->calculateContentSimilarity();
        return $recomCompanies;
    }

    public function followRecom(){

        // $release = Release::where('slug', '=', $slug)->first();
        
        $recommend_company = $this->get_recommend(Auth::user());
        $ids = array_keys($recommend_company);
        $placeholders = implode(',',array_fill(0, count($ids), '?'));
        $companiesContent = Company::whereIn('id', array_keys($recommend_company))->orderByRaw("field(id,{$placeholders})", $ids)->get();

        // $companies = Company::inRandomOrder()->whereNotIn('id', Auth::user()->followings(Company::class)->pluck('id'))->paginate(9);
        // $company1 = Company::find(1);
        // dd(Tag::find($company1->tags));

        
        if(Auth::user()->followings(Company::class)->get()){
            $test = Redis::get('companiesPredict');
            $test = json_decode($test, true);
            $predictArray = [];
            foreach($test as $id => $company){
                $predictArray[$id] = $company[Auth::user()->id];
            }
            $predictArray = array_filter($predictArray, function ($rate) { return $rate != 1; });
            $followingCompany = Auth::user()->followings(Company::class)->pluck('id')->toArray();
            $filtered = array_intersect_key($predictArray, array_flip($followingCompany));
            $result = array_diff_key($predictArray, $filtered);
            // dd($result);
            arsort($result);
            $ids =  array_keys($result);
            $placeholders = implode(',',array_fill(0, count($ids), '?'));       
            $companiesCF = Company::whereIn('id', array_keys($result))->orderByRaw("field(id,{$placeholders})", $ids)->get();
        }
        $companies = $companiesContent->merge($companiesCF)->paginate(9);
        return view('companies.follow_recom', ['companies' => $companies]);
    }

    public function index(){
        $companies = Company::orderBy('verified' , 'desc')->paginate(6);
        return view('admin.company_index', ['companies' => $companies]);
    }

    public function show($id){
        $company = Company::where('id', '=', $id)->first();
        return view('companies.show');
    }

    public function companiesChangeStatus(Request $request, Company $company){
        if($company->verified == false)
        {
            $company->verified = true;
        }
        else
        {
            $company->verified = false;
        }

        $company->save();
        $mailable = new CompanyVerifyEmail($company);
        Mail::to($company->user->email)->send($mailable);
        return response()->json($company->verified);
    }

    public function followCompany(Request $request){

        $company = Company::find($request->company_id);
        $response = auth()->user()->toggleFollow($company);

        return response()->json(['success'=>$response]);
    }
}
