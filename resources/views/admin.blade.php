@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    @foreach($blogs as $key => $value)
                        <div class="card-body">
                            <p class="font-weight-bold">Title: {{ $value->title }}</p>
                            <p>Short Description: {{ $value->short_description }}</p>
                            <p>Long Description: {{ $value->long_description }}</p>
                            <p>Status: {{ $value->status }}</p>

                            @foreach($value->photos as $photo_key => $photo_value)
                                <img src="{{asset($photo_value->path)}}" alt="image" class="small-image">
                            @endforeach

                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
@endsection