@extends('layouts.app')

@section('title','Create Artist')

@section('content')
    <form method="POST" action="{{ route('artists.store') }}">
        @csrf
        <p>Name: <input type="text" name="name" 
            value="{{ old('name') }}"></p>
        <p>Monthly Listeners: <input type="text" name="monthly_listeners" 
            value="{{ old('monthly_listeners') }}"></p>
        <input type="submit" value="Submit">
        <a href="{{ route('artists.index') }}">Cancel</a>
    </form>
 
@endsection
