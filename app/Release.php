<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Enums\ReleaseStatus;
use App\Tag;
use App\Category;
use App\Company;
use Carbon\Carbon;
use CyrildeWit\EloquentViewable\Viewable;
use CyrildeWit\EloquentViewable\Contracts\Viewable as ViewableContract;
use App\Search\Searchable;

class Release extends Model implements ViewableContract
{
    use Viewable;
    use Searchable;
    
    public $fillable = [
        'title', 'description', 'image', 'url_video', 'date', 'active', 'user_id', 'category_ref', 'grade_ref',
    ];

    protected $appends = ['features', 'published'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'release_tag', 'release_id', 'tag_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function scopePolitic($query){
        return $query->where('category_ref', 'Politic')->orderBy('created_at','desc')->orderBy('page_views', 'desc');
    }
    public function scopeBusiness($query){
        return $query->where('category_ref', 'Business')->orderBy('created_at','desc')->orderBy('page_views', 'desc');
    }
    public function scopeTech($query){
        return $query->where('category_ref', 'Tech')->orderBy('created_at','desc')->orderBy('page_views', 'desc');
    }
    public function scopeEducation($query){
        return $query->where('category_ref', 'Education')->orderBy('created_at','desc')->orderBy('page_views', 'desc');
    }
    public function scopeLifestyle($query){
        return $query->where('category_ref', 'Lifestyle')->orderBy('created_at','desc')->orderBy('page_views', 'desc');
    }
    public function scopeSport($query){
        return $query->where('category_ref', 'Sport')->orderBy('created_at','desc')->orderBy('page_views', 'desc');
    }

    public function scopeLasted($query){
        return $query->orderBy('created_at' , 'desc')->take(15)->get();
    }

    public function scopeFeatured($query){
        return $query->orderBy('page_views', 'desc')->orderBy('created_at','desc')->paginate(5);
    }

    public function scopeFeaturedToday($query){
        return $query->whereBetween('created_at', 
            [Carbon::now()->subHours(24)->format("Y-m-d H:i:s"), Carbon::now()]
            )->orderBy('page_views', 'desc')->take(4)->get();
    }

    public function scopeCombined($query){
        return $query->inRandomOrder()->limit(5)->get();
    }

    public function scopeNews($query){
        return $query->orderBy('created_at' , 'desc')->paginate(6);
    }

    public function scopeWeekly($query){
        return $query->whereBetween('created_at', 
            [Carbon::now()->subWeek()->format("Y-m-d H:i:s"), Carbon::now()]
            )->take(12)->get();
    }

    public function scopePopular($query){
        return $query->orderBy('page_views', 'desc')->whereBetween('created_at', 
        [Carbon::now()->subDay(3)->format("Y-m-d H:i:s"), Carbon::now()]
        )->take(4)->get();
    }

    public function scopePublished($query){
        return $query->where('status', ReleaseStatus::Published);
    }

    public function scopeEditing($query){
        return $query->where('status', ReleaseStatus::Editing);
    }

    public function scopePending($query){
        return $query->where('status', ReleaseStatus::Pending);
    }

    public function getFeaturesAttribute()
    {
        $tags = Tag::pluck('title');
        $features = [];
        $release_tags = $this->tags()->pluck('title');
        foreach($tags as $tag){
            $features[$tag] = 0;
            foreach($release_tags as $release_tag){
                if($tag == $release_tag) $features[$tag]++;
            }
        }
        return $features;
    }

    public function getPublishedAttribute(){
        return Carbon::parse($this->created_at)->diffInMinutes();
    }
}
