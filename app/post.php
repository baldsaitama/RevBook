<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $fillable=['user_id','Post','image','is_published'];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function likes(){
        return $this->morphMany(post_like::class,'likeable');
    }
    public function comments(){
        return $this->hasMany(comment::class);
    }
}

