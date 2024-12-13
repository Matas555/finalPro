@extends('layouts.app')

@section('title','Create Profile')

@section('content')
    <form method="POST" action="{{ route('profiles.store') }}">
        @csrf
        <p>Profile: <input type="text" name="name" 
            value="{{ old('name') }}"></p>
     
        <input type="submit" value="Submit">
        <a href="{{ route('profiles.index') }}">Cancel</a>
    </form>
 
@endsection
