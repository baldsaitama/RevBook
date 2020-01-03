@extends('layouts.app')
@section('content')
<!doctype html>
<html lang="en">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('newpost')}}" method="POST" class="container" enctype="multipart/form-data">
        @csrf
        <div class="form-group d-flex flex-column">
            <label for="image   ">{{ __('Choose Image') }}</label>
            <input id="projects" type="file" name="image">
        </div>
        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Create Post</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="createpost"></textarea>
        </div>
        <!-- Material unchecked -->
        <div class="form-check">
            <input type="radio" class="form-check-input abc" id="materialUnchecked ab" name="is_published" value="1" checked>
            <label class="form-check-label" for="materialUnchecked">Publish Post</label>
        </div>

        <!-- Material checked -->
        <div class="form-check">
            <input type="radio" class="form-check-input cb" id="materialChecked cd" name="is_published" value="0" >
            <label class="form-check-label" for="materialChecked">Save as Draft</label>
        </div>
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Publish Post') }}
            </button>
        </div>
    </form>
</body>
</html>
@endsection
