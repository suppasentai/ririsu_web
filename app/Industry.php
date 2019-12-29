<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFollow\Traits\CanBeFavorited;

class Industry extends Model
{
    use CanBeFavorited;

    public $fillable = [
        'title', 'description', 'image'
    ];
}
