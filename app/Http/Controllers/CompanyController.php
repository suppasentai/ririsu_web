<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\User;
use Validator;
use Illuminate\Support\Facades\Hash;
use App\Mail\CompanyVerifyEmail;
use Mail;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function followedCompanies(){
    }

    public function index(){
        $companies = Company::orderBy('verified' , 'desc')->paginate(6);
        return view('admin.company_index', ['companies' => $companies]);
    }

    public function show(){
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
