@extends('layouts.app')

@section('title','Create New Post')

@section('content')
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <p>Post Content: <input type="text" name="post_content" 
            value="{{ old('name') }}"></p>
        <p>Song id: <input type="text" name="song_id" 
            value="{{ old('song_id') }}"></p>
        <input type="submit" value="Submit">
        <a href="{{ route('posts.index') }}">Cancel</a>
    </form>
 
@endsection
