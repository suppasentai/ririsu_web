<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function releases()
    {
        return $this->belongsToMany('App\Release', 'release_tag', 'release_id', 'tag_id');
    }
}
