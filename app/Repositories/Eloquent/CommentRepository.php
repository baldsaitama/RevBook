<?php
namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\Repository;

class CommentRepository extends Repository{
    public function model()
    {
        return 'App\comment';
    }
    public function store($request){
        $com = $request->all();
        $au = $this->create($com);
        return $au;
    }



}
