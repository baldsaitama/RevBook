<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

@extends('layouts.app')
<style>
    html, body {

        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }
    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }
    .form-control:focus{
        border-color: transparent;
        box-shadow: none !important;
    }
</style>

@section('content')
    <div class="container">
@foreach($eachpost as $post)
        <ul class="text-center ">
            <div style="color: red; font-family: 'Calibri Light'; font-size: 25px"><a href="{{route('profile',$post->user->id)}}" class="card-link">{{$post->user->name}}</a></div>
            @if($post->image)
                <a href="{{route('singlepost', $post->id)}}"> <img class="pt-2" src="{{asset($post->image)}}" alt="" height="740" width="870"></a>
            @endif
            <li style="background-color: lightblue; width: 870px; margin: 0 auto; " class="list-group-item mt-2 mb-1 ">{{$post->Post}}</li>
            <span class="like-btn is-active"></span>

            {{--Likes--}}
            <form action="{{route('likes')}}" method="POST">
                @csrf
                <div style="text-align: left; margin-left: 6.25pc; position: relative;">
                    @if (auth()->user())
                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        <input type="hidden" name="likeable_type" value="App\post">
                        @if($post->likes->contains('user_id',auth()->user()->id))
                            <button class="btn btn-primary ">Unlike</button>
                        @else
                            <button class="btn btn-primary ">Like</button>
                        @endif
                    @else
                        <button class="btn btn-primary ">Like</button>

                    @endif
                    @if (count($post->likes)>0)
                        <span>{{count($post->likes)}}</span>
                    @endif
                </div>
            </form>
            <div class="container" style="border: cadetblue">
                @foreach($post->comments as $comment)
                    <div style="color: red; font-family: 'Calibri Light'; font-size: 15px"><a href="{{route('profile',$comment->user->id)}}" class="card-link">{{$comment->user->name}}</a></div>
                    <div>{{$comment->comment_section}}</div>
                @endforeach
            </div>
        </ul>
        {{-- Comment --}}
        @auth
            <form action="comment" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                <input type="hidden" name="post_id" value="{{$post->id}}">
                <div class="form-group" style="width: 880px; margin:-18px auto 0px 138px;">
                    <label for="exampleFormControlTextarea1">Comment</label>
                    <div style="width: 800px;position: relative">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="commentsection" style="border: 2px solid #afafaf;background-color: transparent;border-top-right-radius: 0;border-bottom-right-radius: 0;" ></textarea>
                        <button type="submit" class="btn btn-primary" style="position: absolute;top: 0; right: -71px; height: 60px; border-top-left-radius: 0; border-bottom-left-radius: 0;" >Submit</button>
                    </div>
                </div>
            </form>
        @endauth<hr>
    @endforeach


@endsection
