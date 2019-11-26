<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'title',
    ];

    public function releases()
    {
        return $this->belongsToMany('App\Release', 'release_tag', 'tag_id', 'release_id');
    }
}
