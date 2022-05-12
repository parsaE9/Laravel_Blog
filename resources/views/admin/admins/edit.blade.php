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

            <input type="checkbox" id="user_list" name="user_list" {{ $admin->privileges->user_list ? 'checked' : '' }}>
            <label for="user_list">view users list</label><br>
            <input type="checkbox" id="user_create" name="user_create" {{ $admin->privileges->user_create ? 'checked' : '' }}>
            <label for="user_create">create user</label><br>
            <input type="checkbox" id="user_edit" name="user_edit" {{ $admin->privileges->user_edit ? 'checked' : '' }}>
            <label for="user_edit">edit user</label><br>
            <input type="checkbox" id="user_delete" name="user_delete" {{ $admin->privileges->user_delete ? 'checked' : '' }}>
            <label for="user_delete">delete user</label><br>
            <br>
            <input type="checkbox" id="admin_list" name="admin_list" {{ $admin->privileges->admin_list ? 'checked' : '' }}>
            <label for="admin_list">view admins list</label><br>
            <input type="checkbox" id="admin_create" name="admin_create" {{ $admin->privileges->admin_create ? 'checked' : '' }}>
            <label for="admin_create">create admin</label><br>
            <input type="checkbox" id="admin_edit" name="admin_edit" {{ $admin->privileges->admin_edit ? 'checked' : '' }}>
            <label for="admin_edit">edit admin</label><br>
            <input type="checkbox" id="admin_delete" name="admin_delete" {{ $admin->privileges->admin_delete ? 'checked' : '' }}>
            <label for="admin_delete">delete admin</label><br>
            <br>
            <input type="checkbox" id="blog_list" name="blog_list" {{ $admin->privileges->blog_list ? 'checked' : '' }}>
            <label for="blog_list">view blogs list</label><br>
            <input type="checkbox" id="blog_edit" name="blog_edit" {{ $admin->privileges->blog_edit ? 'checked' : '' }}>
            <label for="blog_edit">edit blog</label><br>
            <input type="checkbox" id="blog_delete" name="blog_delete" {{ $admin->privileges->blog_delete ? 'checked' : '' }}>
            <label for="blog_delete">delete blog</label><br>

        </div>

        <input type="submit" id="submit" class="btn btn-primary" value="Edit The User!">
    </form>

@endsection