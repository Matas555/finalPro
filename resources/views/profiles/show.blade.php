@extends('layouts.app')

@section('title', "Profile of $user->name")

@section('content')
    <div class="profile">
        <h1>Profile of {{ $user->name }}</h1>
        <p>Email: {{ $user->email }}</p>

        <h2>Posts by {{ $user->name }}</h2>
        @foreach($posts as $post)
            <div class="post">
                <h3>{{ $post->song_id }}</h3>
                <p>{{ $post->post_content }}</p>
                <a href="{{ route('posts.show', ['id' => $post->id]) }}">View Post</a>
            </div>
        @endforeach

        <h2>Comments by {{ $user->name }}</h2>
        @foreach($comments as $comment)
            <div class="comment">
                <p>{{ $comment->commenting }}</p>
                <p>On Post: <a href="{{ route('posts.show', ['id' => $comment->post->id]) }}">{{ $comment->post->song_id }}</a></p>
            </div>
        @endforeach
    </div>
@endsection
