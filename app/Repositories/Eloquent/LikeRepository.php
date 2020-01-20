<?php
namespace App\Repositories\Eloquent;

class LikeRepository extends Repository{
    public function model()
    {
        return 'App\post_like';
    }

    public function store($request){
        $like = $request->all();
        $likes = $this->create($like);
        return $likes;
    }
}
