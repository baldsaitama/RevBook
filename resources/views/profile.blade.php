@extends('layouts.app')
@section('content')
<h1>{{implode($name)}}</h1>

    <h3>Published Post</h3>
    @foreach($publishedpost as $publish)
        <img src="{{asset($publish->image)}}">
        <p>{{$publish->Post}}</p>
    @endforeach

    @auth
        @if($test == auth()->user()->id)
            <h3>Drafts</h3>
                @foreach($draft as $publish)

                    <img src="{{asset($publish->image)}}">
                    <p>{{$publish->Post}}</p>
                @endforeach
        @endif
    @endauth

@endsection
