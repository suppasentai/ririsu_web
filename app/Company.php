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

    public function getFollowersIdAttribute(){
        $ids = [];
        $users_ids = User::pluck('id');
        $followers_ids= $this->followers()->pluck('id');
        $magniture = sqrt(count($followers_ids));
        foreach($users_ids as $user_id){
            $ids[$user_id] = 0;
            foreach($followers_ids as $follower_id){
                if($user_id == $follower_id) $ids[$user_id] = 1/$magniture;
            }
        }
        return $ids;
    }
}
