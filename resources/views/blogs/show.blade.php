@extends('layouts.template')

@section('content')

    <h1>Showing {{ $blog->id }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $blog->title }}</h2>
        <p>
            <strong>Email:</strong> {{ $blog->short_description }}<br>
            <strong>Level:</strong> {{ $blog->long_description }}
        </p>
    </div>

@endsection