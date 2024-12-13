@extends('layouts.app')

@section('title','Artist Details')

@section('content')
    <ul>
        <li>Name: {{ $artist->name}}</li>
        <li>Monthly Listeners: {{$artist->monthly_listeners}}</li>
</ul>

    <form method="POST"
        action="{{ route('artists.destroy', ['id' => $artist->id]) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>

    <p><a href="{{ route('artists.index') }}">Back</a></p>

@endsection
