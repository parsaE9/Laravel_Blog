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

    <form action="{{ route('admins.update', $admin->id) }}" method="POST">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group">
            <label>
                <input name="username" placeholder="username" type="text" value="{{ $admin->username }}"
                       class="form-control">
            </label>
        </div>

        <div class="form-group">
            <label>
                <input name="email" placeholder="email" type="email"
                       value="{{ $admin->email }}" class="form-control">
            </label>
        </div>

        <div class="form-group">
            <label>
                <input name="password" placeholder="password" type="password"
                       value="{{ $admin->password }}" class="form-control">
            </label>
        </div>


        <div class="form-group">
            @foreach($privileges as $privilege)
                <input type="checkbox" id="{{ $privilege->name }}" value="{{ $privilege->id }}" name="access[]" {{ edit_admin($privilege->name, $admin->id) ? 'checked' : '' }}>
                <label for="{{ $privilege->name }}">{{ $privilege->name }}</label><br>
            @endforeach
        </div>


        <input type="submit" id="submit" class="btn btn-primary" value="Edit The User!">
    </form>

@endsection