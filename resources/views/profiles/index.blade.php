@extends('layouts.app')

@section('title','Profiles')

@section('content')

@if (session('message'))
    <p><b>{{ session('message') }}</b></p>
@endif

    <p>A list of profiles...</p>
    <ul>
        @foreach ($profiles as $profile)
            <li><a href="{{route('profiles.show',
            ['id' => $profile->id])}}">{{$profile->name}}</a></li>
        @endforeach
</ul>
<a href="{{ route('profiles.create' )}}">Create Profile</a>
@endsection
