<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\post;
use App\User;



class CreatePostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('createpost');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (request()->hasFile('image')){
            request()->validate([
                'image' => 'file|image|max:5000'
            ]);
        }
        $any = new post;
                $any->Post = Input::get('createpost');
                $any->user_id = Input::get('user_id');
                $any->is_published = Input::get('is_published');

                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $ext = $image->getClientOriginalExtension();
                    $imageName = str_random(5) . '.' . $ext;
                    $uploadPath = public_path('images');
                    $image->move($uploadPath, $imageName);
                    $data['photo_path']="images/{$imageName}";
                    $any->image = $data['photo_path'];
                    }
                $any->save();

                return redirect('/');


}

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $publishedpost = post::where('is_published', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(2);

        $usernames = User::all()
            ->pluck('name')
            ->toArray();

        return view('welcome', compact('usernames', 'publishedpost'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function validaterequest(){

    }



}
