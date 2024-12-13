@extends('layouts.app')

@section('title','Artists')

@section('content')

@if (session('message'))
    <p><b>{{ session('message') }}</b></p>
@endif

    <p>A list of artists...</p>
    <ul>
        @foreach ($artists as $artist)
            <li><a href="{{route('artists.show',
            ['id' => $artist->id])}}">{{$artist->name}}</a></li>
        @endforeach
</ul>
<a href="{{ route('artists.create' )}}">Create Artist</a>
@endsection
