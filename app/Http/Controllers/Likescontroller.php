<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules\In;
use App\post_like;
use App\post;
use App\User;

class Likescontroller extends Controller
{


    public function store(Request $request){

        $likedpost = new post_like;
        $post = post::where('id',$request->post_id)->first();
        $likedpost->user_id = Input::get('user_id');
        $likedpost->likeable_id = Input::get('post_id');
        $likedpost->likeable_type = Input::get('likeable_type');

        if(count($post->likes->where('user_id', auth()->user()->id))>0){
            $post->likes()->where('user_id', auth()->user()->id)->delete();
            return back();
        }


        $likedpost->save();

        return redirect('/');
    }


}

