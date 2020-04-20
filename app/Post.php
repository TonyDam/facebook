<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    public function user() {
        return $this->belongsTo(\App\User::class);
    }

    public function postLike() {
        return $this->hasMany(Like::class,'post_id');
    }

}