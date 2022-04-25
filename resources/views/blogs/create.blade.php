@extends('layouts.template')

@section('content')

    <h1>Create a Blog</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/blogs" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>
                <input name="title" placeholder="title" type="text" class="form-control">
            </label>
        </div>

        <div class="form-group">
            <label>
                <input name="short_description" placeholder="short description" type="text" class="form-control">
            </label>
        </div>

        <div class="form-group">
            <label>
                <textarea name="long_description" placeholder="long description" cols="90" class="form-control"></textarea>
            </label>
        </div>

        <div class="form-group">
            <label>
                <select class="form-control" name="status">
                    <option value="1">Active</option>
                    <option value="2">Inactive</option>
                </select>
            </label>
        </div>

        <div class="form-group hdtuto">
            <label>
                <input name="images[]" type="file" class="form-control">
            </label>
            <button class="btn btn-success" id="add" type="button">Add</button>
        </div>

        <input type="submit" id="submit" class="btn btn-primary" value="Create The Blog!">

    </form>

@endsection