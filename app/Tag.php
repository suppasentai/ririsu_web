<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFollow\Traits\CanBeFavorited;

class Tag extends Model
{
    use CanBeFavorited;

    protected $fillable = [
        'title',
    ];

    public function releases()
    {
        return $this->belongsToMany('App\Release', 'release_tag', 'tag_id', 'release_id');
    }
}
