@extends('layouts.app')

@section('title','Album details')

@section('content')
    <ul>
            <li>Album's name: {{$album->name}}</li>
            <li>Album's artist: {{$album->artist->name}}</li>
</ul>
@endsection
