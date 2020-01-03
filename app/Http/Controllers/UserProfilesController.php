<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
use App\User;

class UserProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $name = User::where('id', $id)->pluck('name')->toArray();
        $test = $id;
        $publishedpost = post::where('is_published', 1)
            ->where('user_id', $id)
            ->orderBy('created_at', 'desc')
            ->get();
        $draft = post::where('is_published', 0)
           ->where('user_id', $id)
            ->orderBy('created_at', 'desc')
            ->get();


        return view('profile', compact('publishedpost', 'draft','test', 'name') );

    }
    public function search(Request $request){
        $search = $request->input('query');
        $results = User::where('name', 'like', "%$search%")->get();
        return view('search', compact('results'));

    }
    public function singlepost($id){
        $eachpost = post::where('id', $id)->get();

        return view('singlepost', compact('eachpost'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
