@extends('layouts.app')

@section('title','Create Comment')

@section('content')
    <form method="POST" action="{{ route('comments.store') }}">
        @csrf
        <p>Comment: <input type="text" name="commenting" 
            value="{{ old('name') }}"></p>
        <p>Post id: <input type="text" name="post_id" 
            value="{{ old('post_id') }}"></p>
        <input type="submit" value="Submit">
        <a href="{{ route('comments.index') }}">Cancel</a>
    </form>
 
@endsection
