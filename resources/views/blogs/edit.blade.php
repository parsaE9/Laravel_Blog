@extends('layouts.template')

@section('content')


    <h1>Edit {{ $blog->id }}</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('blogs.update', $blog->id) }}" method="POST">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group">
            <label>
                <input name="title" type="text" value="{{ $blog->title }}" class="form-control">
            </label>
        </div>

        <div class="form-group">
            <label>
                <input name="short_description" type="email" value="{{ $blog->short_description }}"
                       class="form-control">
            </label>
        </div>

        <div class="form-group">
            <label>
                <input name="long_description" type="email" value="{{ $blog->long_description }}" class="form-control">
            </label>
        </div>

        <div class="form-group">
            <label>
                <select class="form-control" name="status">
                    <option value="active">Volvo</option>
                    <option value="inactive">Saab</option>
                </select>
            </label>
        </div>

        <input type="submit" class="btn btn-primary" value="Edit The Shark!">
    </form>

@endsection