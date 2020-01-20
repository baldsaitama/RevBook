<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\post_like;
use App\post;
use App\Repositories\Eloquent\LikeRepository;


class Likescontroller extends Controller
{
    function __construct(LikeRepository $likepost)
    {
        $this->likepost = $likepost;
    }

    public function store(Request $request){

        $post = post::where('id',$request->likeable_id)->first();

         if(count($post->likes->where('user_id', auth()->user()->id))>0) {
             $post->likes()->where('user_id', auth()->user()->id)->delete();
                return back();
         }
        $this->likepost->store($request);

        return ("works");
    }


}

