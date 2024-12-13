@extends('layouts.app')

@section('title', 'Post Details')

@section('content')
<div class="container">
    <!-- Post Details -->
    <div class="post">
        <h1>Post Content: </h1>
        <p> {{ $post->post_content }}</p>
        <p>
            Posted by <a href="{{ route('profiles.show', $post->user->id) }}" >
                {{ $post->user->name }}</a>
        </p>
    </div>

    <div>
        <h2>Comments:</h2>

        <!-- Display Existing Comments -->
        <div>
            @forelse($post->comments as $comment)
                <div>
                    <p>{{ $comment->commenting }}</p>
                    <p>
                        Commented by <a href="{{ route('profiles.show', $comment->user->id) }}">
                            {{ $comment->user->name }}</a>
                    </p>
                </div>
            @empty
                <p>No comments yet. Be the first to comment!</p>
            @endforelse
        </div>

        <div>
            <form action="{{ route('comments.store') }}" method="POST">
                @csrf
                <textarea name="commenting" placeholder="Write a comment..." ></textarea>
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <button type="submit" >
                    Submit
                </button>
            </form>
        </div>
    </div>

    <!-- Delete Post Form -->
    @if(Auth::check() && Auth::user()->id === $post->user_id) 
        <div>
            <form method="POST" action="{{ route('posts.destroy', ['id' => $post->id]) }}">
                @csrf
                @method('DELETE')
                <button type="submit" 
                    onclick="return confirm('Are you sure you wish to delete this post?')">
                    Delete Post
                </button>
            </form>
        </div>
    @endif

    <!-- Back Button -->
    <div>
        <a href="{{ route('posts.index') }}">Back to Posts</a>
    </div>
</div>
@endsection
