<?php

namespace App\Transformers;

use App\post;
use League\Fractal\TransformerAbstract;

class PostTransformer extends TransformerAbstract
{

    public function transform(post $post)
    {
        return [
            'id'=> $post->id,
            'user_id'=> $post->user_id,
            'image'=> asset($post->image),
            'Post' => $post->Post,
            'publish_status' => $post->is_published
        ];
    }
}
