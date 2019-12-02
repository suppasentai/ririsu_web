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
        'bussiness_category_ref', 'email'];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
