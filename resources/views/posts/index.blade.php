@extends('layouts.app')

@section('title','Posts')

@section('content')

@if (session('message'))
    <p><b>{{ session('message') }}</b></p>
@endif

    <p>A list of posts...</p>
    <ul>
        @foreach ($posts as $post)
            <li><a href="{{route('posts.show',
            ['id' => $post->id])}}">{{$post->post_content}}</a></li>
        @endforeach
</ul>
<a href="{{ route('posts.create' )}}">Create Post</a>
@endsection
