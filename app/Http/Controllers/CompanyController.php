<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\User;
use Validator;
use Illuminate\Support\Facades\Hash;
use App\Mail\CompanyVerifyEmail;
use Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

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

    public function followRecom(){
        
        $companies = Company::inRandomOrder()->whereNotIn('id', Auth::user()->followings(Company::class)->pluck('id'))->paginate(9);
        if(Auth::user()->followings(Company::class)->get()){
            $test = Redis::get('companiesPredict');
            $test = json_decode($test, true);
            $predictArray = [];
            foreach($test as $id => $company){
                $predictArray[$id] = $company[Auth::user()->id];
            }
            $predictArray = array_filter($predictArray, function ($rate) { return $rate != 1; });
            arsort($predictArray);
            $ids =  array_keys($predictArray);
            $placeholders = implode(',',array_fill(0, count($ids), '?'));       
            $companies = Company::whereIn('id', array_keys($predictArray))->orderByRaw("field(id,{$placeholders})", $ids)->paginate(9);
        }
        // dd($companies);
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
