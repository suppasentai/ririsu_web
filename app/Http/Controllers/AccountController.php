<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Grade;
use App\Company;
use App\Release;
use App\User;
use App\Industry;
use App\Tag;
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

    public function coldStart(){
        $industries = Industry::all();
        $tags = Tag::all()->random(24);
        return view('my_account.start', ['industries' => $industries, 'tags'=> $tags]);
    }

    public function endStart(Request $request){
        $tags_ids = array_keys($request->all());
        $tags_ids = array_filter($tags_ids, function($item){
            return(is_int($item));
        });
        
        $tags = Tag::find($tags_ids)->all();
        // dd($tags);
        auth()->user()->toggleFavorite($tags);
        // dd(auth()->user()->toggleFavorite($tags));
        return redirect(route('follow_recom'));
    }

    public function industryChangeStatus(Request $request, Industry $industry){

        auth()->user()->toggleFavorite($industry);

        return response()->json(auth()->user()->hasFavorited($industry));
    }

    protected function get_recommend($currentrelease){
        $releases = Release::all()->toJSON();
        $releases        = json_decode($releases);
        $selectedId      = intval($currentrelease->id);
        $selectedRelease = $releases[0];

        $selectedReleases = array_filter($releases, function ($release) use ($selectedId) { return $release->id === $selectedId; });
        
        if (count($selectedReleases)) {
            $selectedRelease = $selectedReleases[array_keys($selectedReleases)[0]];
            // dd($selectedRelease);
        }

        $releaseSimilarity = new ReleaseSimilarity($releases);
        $similarityMatrix  = $releaseSimilarity->calculateSimilarityMatrix();
        
        $releases   = $releaseSimilarity->getReleasesSortedBySimularity($selectedId, $similarityMatrix);
        $releases_id = array_column($releases, 'id');
        return $releases_id = array_slice($releases_id, 0, 5);
    }

    public function index()
    {
        $following_companies = Auth::user()->followings(Company::class)->get();
        // dd($following_companies);
        $news = collect(new Release);
        $favorating_tags = Auth::user()->favorites(Tag::class)->with('releases')->get();
        if(count($following_companies)){
            foreach($following_companies as $following_company){
                // dd($following_company);
                $news = $news->merge($following_company->releases);
            }
            $news = $news->sortByDesc('updated_at');
        }
        else $news = Release::orderBy('updated_at', 'desc');
        $another_news = $news->splice(3)->paginate(10);
        return view('my_account.index', ['news' => $news, 'another_news' => $another_news, 'favorating_tags' => $favorating_tags] );
    }

    public function articles()
    {
        $articles = Auth::user()->articles->sortByDesc('updated_at')->paginate(5);
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
