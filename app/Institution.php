<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
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
