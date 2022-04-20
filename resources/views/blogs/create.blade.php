@extends('layouts.template')

@section('content')

    <h1>Create a shark</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/blogs">
        @csrf

        <div class="form-group">
            <label>
                <input name="title" type="text" class="form-control">
            </label>
        </div>

        <div class="form-group">
            <label>
                <input name="short_description" type="email" class="form-control">
            </label>
        </div>

        <div class="form-group">
            <label>
                <input name="long_description" type="email" class="form-control">
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

        <input type="submit" class="btn btn-primary" value="Create The Shark!">

    </form>

@endsection