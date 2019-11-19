<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Institution;
use App\User;

class InstitutionController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function create_step1(Request $request){
        $institution = $request->session()->get('institution');
        return view('institutions.create_step1', ['institution' => $institution]);
    }

     /**
     * Post Request to store step1 info in session
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function post_create_step1(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'bail|required|min:3|max:30',
            'representative_name' => 'bail|required|min:6|max:50',
            'incorp_date' => 'bail|nullable|date',
            'location' => 'bail|required',
            'tel' => 'bail|required|regex:/(01)[0-9]{9}/',
            'identification_code' => 'bail|required|min:6|max:10',
            'capital_stock' => 'nullable',
            'employees_number' => 'nullable',
            'url' => 'bail|nullable|url',
            'email' => 'bail|required|email'
            ]);


        if(empty($request->session()->get('institution'))){
            $institution = new Institution();
            $institution->fill($validatedData);
            $request->session()->put('institution', $institution);
        }else{
            $institution = $request->session()->get('institution');
            $institution->fill($validatedData);
            $request->session()->put('institution', $institution);
        }

        return redirect()->route('create_step2');

    }

    public function create_step2(Request $request){
        $institution = $request->session()->get('institution');
        $user = $request->session()->get('user');
        return view('institutions.create_step2', ['institution' => $institution, 'user' => $user]);
    }

    public function post_create_step2(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'bail|required|string|min:6|max:70',
            'email' => 'bail|required|string|email|max:255',
            'password' => 'bail|required|string|min:6',
            'password_confirmation' => 'bail|required|same:password',
        ]);
        if(empty($request->session()->get('user'))){
            $user = new User();
            $user->fill($validatedData);
            $request->session()->put('user', $user);
        }else{
            $user = $request->session()->get('user');
            $user->fill($validatedData);
            $request->session()->put('user', $user);
        }
        return redirect()->route('create_step3');
    }

    public function create_step3(Request $request){
        $institution = $request->session()->get('institution');
        $user = $request->session()->get('user');
        return view('institutions.create_step3', ['institution' => $institution, 'user' => $user]);
    }

    public function store(Request $request)
    {
        $institution = $request->session()->get('institution');
        $user = $request->session()->get('user');
        $institution->save();
        $user->save();
        return redirect('home');
    }
}
