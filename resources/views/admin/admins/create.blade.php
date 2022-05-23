@extends('layouts.template')

@section('content')

    <h1>Create a Admin</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/admins" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>
                <input name="username" placeholder="username" type="text" class="form-control">
            </label>
        </div>

        <div class="form-group">
            <label>
                <input name="email" placeholder="email" type="email" class="form-control">
            </label>
        </div>

        <div class="form-group">
            <label>
                <input name="password" placeholder="password" type="password" class="form-control">
            </label>
        </div>

        <label>
            <input name="privilege" type="checkbox" value="2" checked hidden>
        </label>


        <div class="form-group">
            @foreach($privileges as $privilege)
                <input type="checkbox" id="{{ $privilege->name }}" value="{{ $privilege->id }}" name="access[]">
                <label for="{{ $privilege->name }}">{{ $privilege->name }}</label><br>
            @endforeach
        </div>


        <input type="submit" id="submit" class="btn btn-primary" value="Create The Admin!">
    </form>

@endsection