<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Enums\ReleaseStatus;
use App\Tag;
use Carbon\Carbon;

class Release extends Model
{
    
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
