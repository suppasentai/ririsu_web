<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Grade;
use App\Institution;
use App\Release;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function index()
    {
        $news = Release::orderBy('created_at', 'desc')->paginate(9);
        return view('my_account.index', ['news' => $news]);
        // return view('my_account.category7');
    }

    public function articles()
    {
        $articles = Release::where('user_id', '=', '1')->orderBy('created_at', 'desc')->paginate(2);
        return view('my_account.my_articles', ['articles' => $articles]);
    }

    public function edit()
    {
        $user = Auth::user();
        $grades = Grade::all();
        $institutions = Institution::all();
        return view('my_account.edit', ['user' => $user, 'grades' => $grades, 'institutions' => $institutions]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'grade' => 'required|max:255',
            'identification_document' => 'nullable',
            'telephone' => 'nullable',
            'address' => 'nullable',
        ]);
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
                $exists = Storage::disk('imagesUsers')->exists($user->image);
                if ($exists) {
                    Storage::disk('imagesUsers')->delete($user->image);
                }
                $file_route = time() . '_' . $img->getClientOriginalName();
                Storage::disk('imagesUsers')->put($file_route, \File::get($img));
                $user->image = $file_route;
            } elseif($img->getError() == 1) {
                $strFlash = $img->getErrorMessage();
                $strStatus = 'warning';
            }
        }
        $user->save();
        return redirect(route('my_account'))->with($strStatus, $strFlash);
    }
}
