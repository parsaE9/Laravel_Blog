@extends('layouts.template')

@section('content')

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group">
            <label>
                <input name="title" placeholder="title" type="text" value="{{ $blog->title }}" class="form-control">
            </label>
        </div>

        <div class="form-group">
            <label>
                <input name="short_description" placeholder="short description" type="text"
                       value="{{ $blog->short_description }}" class="form-control">
            </label>
        </div>

        <div class="form-group">
            <label>
                <textarea name="long_description" placeholder="long description" cols="90"
                          class="form-control">{{ $blog->long_description }}</textarea>
            </label>
        </div>

        <div class="form-group">
            <label>
                <select class="form-control" name="status">
                    @if($blog->status == '1')
                        <option value="1" selected="selected">Active</option>
                        <option value="2">Inactive</option>
                    @else
                        <option value="1">Active</option>
                        <option value="2" selected="selected">Inactive</option>
                    @endif
                </select>
            </label>
        </div>

        @foreach($blog->photos as $key => $value)
            <div class="form-group hdtuto">
                <label>
                    <img src="{{asset($value->path)}}" alt="image" class="form-control small-image ">
                </label>
                <button class="btn btn-danger float-right" id="remove" type="button">Remove</button>
                <label>
                    <input name="previous_images[]" type="checkbox" value="{{asset($value->path)}}" checked hidden>
                </label>
            </div>
        @endforeach

        <div class="form-group hdtuto">
            <label>
                <input name="images[]" type="file" class="form-control">
            </label>
            <button class="btn btn-success" id="add" type="button">Add</button>
        </div>
        <input type="submit" id="submit" class="btn btn-primary" value="Edit The Blog!">
    </form>

@endsection