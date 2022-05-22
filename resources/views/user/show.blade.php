@extends('layouts.template')

@section('content')


    <div class="jumbotron">
        <h2>Title: {{ $blog->title }}</h2><br>
        <div>
            <strong>Short Description:</strong> {{ $blog->short_description }}<br>
            <strong>Long Description:</strong> {{ $blog->long_description }}<br>

            @if ($blog->status == '1')
                <strong>Status:</strong> Active <br><br>
            @else
                <strong>Status:</strong> Inactive <br><br>
            @endif

            @foreach($blog->photos as $key => $value)
                <div class="small-image" style="background-image: url({{asset($value->path)}});"></div>
                <br>
            @endforeach

        </div>
    </div>

@endsection