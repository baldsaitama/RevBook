<?php
namespace App\Repositories\Eloquent;

use App\post;

class CreatePostRepository extends Repository{
    public function model(){
        return 'App\post';
    }


    public function store($request){
        $inputs = $request->except(['image']);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $imageName = str_random(5) . '.' . $ext;
            $uploadPath = public_path('images');
            $image->move($uploadPath, $imageName);
            $data['photo_path']="images/{$imageName}";
            $inputs['image'] = $data['photo_path'];
        }
        $any = $this->create($inputs);

        return $any;

    }



}

