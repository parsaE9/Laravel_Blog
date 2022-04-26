@extends('layouts.template')

@section('content')


    <div class="jumbotron">
        <h2>Title: {{ $blog->title }}</h2><br>
        <p>
            <strong>Short Description:</strong> {{ $blog->short_description }}<br><br>
            <strong>Long Description:</strong> {{ $blog->long_description }}<br><br><br>

            @if ($blog->status == '1')
                <strong>Status:</strong> Active <br><br><br>
            @else
                <strong>Status:</strong> Inactive <br><br><br>
            @endif

            @foreach($blog->photos as $key => $value)
                <img src="{{asset($value->path)}}" alt="image" class="form-control float-left"
                     style="height: 100px; width: 100px;">
            @endforeach

        </p>
    </div>

@endsection