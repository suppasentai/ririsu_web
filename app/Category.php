<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Release;

class Category extends Model
{
    public $fillable = [
        'title', 'description', 'image'
    ];

    public function releases(){
        return $this->hasMany(Release::class);
    }
}
