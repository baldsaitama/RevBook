<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Repositories\Eloquent\LikeRepository;
use App\post;
use App\Http\Controllers\Controller;

class LikesController extends Controller
{
    function __construct(LikeRepository $likepost)
    {
        $this->likepost = $likepost;
    }

    public function store(Request $request){

        $post = post::where('id',$request->likeable_id)->first();
        if(count($post->likes->where('user_id', $request->user_id))>0) {
            $post->likes()->where('user_id', $request->user_id)->delete();
            return $this->respondSuccess("Post Liked");
        }
        $this->likepost->store($request);
        return $this->respondSuccess("Post Liked");
    }


}

