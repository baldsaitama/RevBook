<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post_like extends Model
{
    protected $fillable = ['user_id', 'likeable_id', 'likeable_type'];

    private function user(){
        return $this->belongsTo('User');

    }
}
