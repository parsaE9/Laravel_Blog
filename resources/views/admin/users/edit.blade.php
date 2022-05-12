@extends('layouts.template')

@section('content')

    <h1>Edit a User</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group">
            <label>
                <input name="username" placeholder="username" type="text" value="{{ $user->username }}" class="form-control">
            </label>
        </div>

        <div class="form-group">
            <label>
                <input name="email" placeholder="email" type="email"
                       value="{{ $user->email }}" class="form-control">
            </label>
        </div>

        <div class="form-group">
            <label>
                <input name="password" placeholder="password" type="password"
                       value="{{ $user->password }}" class="form-control">
            </label>
        </div>

        <input type="submit" id="submit" class="btn btn-primary" value="Edit The User!">
    </form>

@endsection