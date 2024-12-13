@extends('layouts.app')

@section('title','Comments')

@section('content')

@if (session('message'))
    <p><b>{{ session('message') }}</b></p>
@endif

    <div class="comments">
        @foreach($comments as $comment)
            <div class="comment">
                <p>{{ $comment->commenting }}</p>
                <p>Commented by: <a href="{{ route('profiles.show', ['id' => $comment->user->id]) }}">{{ $comment->user->name }}</a>

                <p>On Post: <a href="{{ route('posts.show', ['id' => $comment->post->id]) }}">{{ $comment->post->song_id }}</a>

            </div>
        @endforeach
    </div>
@endsection
