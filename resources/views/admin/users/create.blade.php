@extends('layouts.template')

@section('content')

    <h1>Create a User</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/users">
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

        <input type="submit" id="submit" class="btn btn-primary" value="Create The User!">

    </form>

@endsection