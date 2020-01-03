
@extends('layouts.app')
@section('content')
<div class="col-4">
    <p>{{$results->count()}} results(s) for {{request()->input('query')}}</p>
    @foreach($results as $result)
        <div><a href="{{route('profile', $result->id)}}" class="card-link">{{$result->name}}</a></div>

    @endforeach

</div>
@endsection
