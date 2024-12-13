@extends('layouts.app')

@section('title','Albums')

@section('content')
    <p>A list of albums...</p>
    <ul>
        @foreach ($albums as $album)
            <li>{{$album->name}}</li>
        @endforeach
</ul>
@endsection
