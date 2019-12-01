<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\User;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

use App\ActivationService;

class CompanyRegisterController extends Controller
{
    //protected $activationService;
    //
    public function __construct(ActivationService $activationService)
    {
        $this->middleware('guest');
        $this->activationService = $activationService;
    }

    public function create_step1(Request $request){
        return view('companies.create_step1');
    }

    public function post_create_step1(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required|min:3|max:100',
            'representative_name' => 'required|min:6|max:50',
            'identification_code' => 'required|min:6|max:10',
            'tel' => 'required|regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/',
            'location' => 'required',
            'email' => 'required|email',
            'url' => 'nullable|url',
            'employees_number' => 'nullable',
            'capital_stock' => 'nullable',
            'incorp_date' => 'nullable|date',
        ]);
        if ($validator->fails()) {
			return response()->json(['error'=>$validator->errors()->all()]);
        }

        return response()->json(['success'=>'Added new records.']);
    	
    }

    public function post_create_step2(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'first_name' => 'required|string|min:1|max:20',
            'last_name' => 'required|string|min:1|max:20',
            //'name' => 'nullable|string|min:6|max:70',
            'telephone' => 'required|regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/',
            'user_email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6',
            'password_confirmation' => 'required|same:password',
        ]);
        if ($validator->fails()) {
			return response()->json(['error'=>$validator->errors()->all()]);
        }

        $company = new Company();
        $company->title = $request->title;
        $company->representative_name = $request->representative_name;
        $company->identification_code = $request->identification_code;
        $company->tel = $request->tel;
        $company->location = $request->location;
        $company->email = $request->email;
        $company->url = $request->url;
        $company->employees_number = $request->employees_number;
        $company->capital_stock = $request->capital_stock;
        $company->incorp_date = $request->incorp_date;

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->telephone = $request->telephone;
        $user->email = $request->user_email;
        $user->password = Hash::make($request->password);
        $user->slug = uniqid();

        $company->save();
        $user->save();

        $company->user()->save($user);

        event(new Registered($user));
        auth()->login($user);

        $this->activationService->sendActivationMail($user);

        return response()->json(['success'=>'Added new records.']);
    }
}
