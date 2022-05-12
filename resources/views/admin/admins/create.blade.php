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

        <div class="form-group">
            <input type="checkbox" id="user_list" name="user_list">
            <label for="user_list">view users list</label><br>
            <input type="checkbox" id="user_create" name="user_create">
            <label for="user_create">create user</label><br>
            <input type="checkbox" id="user_edit" name="user_edit">
            <label for="user_edit">edit user</label><br>
            <input type="checkbox" id="user_delete" name="user_delete">
            <label for="user_delete">delete user</label><br>
            <br>
            <input type="checkbox" id="admin_list" name="admin_list">
            <label for="admin_list">view admins list</label><br>
            <input type="checkbox" id="admin_create" name="admin_create">
            <label for="admin_create">create admin</label><br>
            <input type="checkbox" id="admin_edit" name="admin_edit">
            <label for="admin_edit">edit admin</label><br>
            <input type="checkbox" id="admin_delete" name="admin_delete">
            <label for="admin_delete">delete admin</label><br>
            <br>
            <input type="checkbox" id="blog_list" name="blog_list">
            <label for="blog_list">view blogs list</label><br>
            <input type="checkbox" id="blog_edit" name="blog_edit">
            <label for="blog_edit">edit blog</label><br>
            <input type="checkbox" id="blog_delete" name="blog_delete">
            <label for="blog_delete">delete blog</label><br>

        </div>

        <input type="submit" id="submit" class="btn btn-primary" value="Create The Admin!">
    </form>

@endsection