<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Overtrue\LaravelFollow\Traits\CanFollow;
use Overtrue\LaravelFollow\Traits\CanFavorite;

class User extends Authenticatable
{
    use Notifiable, CanFollow, CanFavorite;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'first_name', 'last_name', 'email', 'password', 'image', 'grade',
        'institution_ref', 'telephone', 'identification_document', 'address', 'slug'
    ];

    protected $appends = ['features'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function articles()
    {
        return $this->hasMany(Release::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasAccess(array $permissions) : bool
    {
        // check if the permission is available in any role
        foreach ($this->roles as $role) {
            if($role->hasAccess($permissions)) {
                return true;
            }
        }
        return false;
    }

    public function inRole(string $roleSlug)
    {
        return $this->roles()->where('slug', $roleSlug)->count() == 1;
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function getFeaturesAttribute()
    {
        $tags = Tag::pluck('title');
        $features = [];
        $favorited_tags = $this->favorites(Tag::class)->get();
        // dd($tags);
        $release_tags = $favorited_tags->pluck('title');
        foreach($tags as $tag){
            $features[$tag] = 0;
            foreach($release_tags as $release_tag){
                if($tag == $release_tag) $features[$tag]++;
            }
        }
        return $features;
    }
}
