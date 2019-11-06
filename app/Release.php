<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Release extends Model
{
    public $fillable = [
        'title', 'description', 'image', 'url_video', 'date', 'active', 'user_id', 'category_ref', 'grade_ref', 'institution_ref',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
