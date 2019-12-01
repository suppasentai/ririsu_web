<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Grade;
use App\Company;
use App\Release;
use App\User;
use App\Http\Requests\EditProfileRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;

class AccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $news = Release::orderBy('created_at', 'desc')->paginate(9);
        $featured_news = Release::orderBy('created_at', 'desc')->paginate(5);
        return view('my_account.index', ['news' => $news]);
    }

    public function articles()
    {
        $articles = Release::where('user_id', '=', '1')->orderBy('created_at', 'desc')->paginate(5);
        return view('my_account.my_articles', ['articles' => $articles]);
    }

    public function edit()
    {
        $user = Auth::user();
        $grades = Grade::all();
        $companies = Company::all();
        return view('my_account.edit', ['user' => $user, 'grades' => $grades, 'companies' => $companies]);
    }

    public function update(EditProfileRequest $request)
    {
        $user = User::find(Auth::user()->id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->grade = $request->grade;
        $user->identification_document = $request->identification_document;
        $user->telephone = $request->telephone;
        $user->address = $request->address;
        $img = $request->file('image');
        $strFlash = 'User Edited';
        $strStatus = 'success';
        if ($img != null) {
            if ($img->getError() == 0) {
                $file_route = time() . '_' . $img->getClientOriginalName();
                $img_resize = Image::make($img->getRealPath())->resize(100, 100); 
                $img_resize = $img_resize->stream(); 
                Storage::disk('s3')->put($file_route, $img_resize->__toString());
                $user->image = Storage::disk('s3')->url($file_route);
            } elseif($img->getError() == 1) {
                $strFlash = $img->getErrorMessage();
                $strStatus = 'warning';
            }
        }else{
            $user->image = $user->image;
        }
        $user->save();
        return redirect(route('my_account_edit'))->with($strStatus, $strFlash);
    }

    public function editPassword(){
        return view('my_account.edit_password');
    }

    public function updatePassword(Request $request){
        if (!(Hash::check($request->get('old_password'), Auth::user()->password))) {
            // The passwords not matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
            // return response()->json(['errors' => ['current'=> ['Current password does not match']]], 422);
        }
        //uncomment this if you need to validate that the new password is same as old one

        // if(strcmp($request->get('old_password'), $request->get('new_password')) == 0){
        //     //Current password and new password are same
        //     //return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        //     return response()->json(['errors' => ['current'=> ['New Password cannot be same as your current password']]], 422);
        // }
        $validatedData = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|string|min:6|confirmed',
        ]);
        //Change Password
        $user = Auth::user();
        $user->password = Hash::make($request->get('new_password'));
        $user->save();
        return $user;
    }
}
