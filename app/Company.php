<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFollow\Traits\CanBeFollowed;

class Company extends Model
{
    use CanBeFollowed;

    public $fillable = ['title', 'representative_name',
        'incorp_date', 'location', 'tel',
         'identification_code', 'capital_stock',
        'employees_number', 'url',
        'industry_ref', 'email'];

    protected $appends = ['followers_id'];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function releases()
    {
        return $this->hasMany(Release::class)->orderBy('created_at','desc');
    }

    public function getFollowersIdAttribute(){
        $values = [];
        $users = User::where('company_id', null)->get();
        $followers_ids= $this->followers()->pluck('id');
        
        foreach($users as $user){
            $magniture = 0;
            $followingCompanies = $user->followings(Company::class)->pluck('id');
            $magniture = sqrt(count($followingCompanies));
            $values[$user->id] = 0;
            foreach($followers_ids as $follower_id){
                if($user->id == $follower_id) $values[$user->id] = 1/$magniture;
            }
        }
        return $values;
    }
}
