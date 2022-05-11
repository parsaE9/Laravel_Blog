@extends('layouts.template')

@section('content')


    <div class="jumbotron">
        <h2>User ID: {{ $user->id }}</h2><br>
        <p>
            <strong>Username:</strong> {{ $user->username }}<br><br>
            <strong>Email:</strong> {{ $user->email }}<br><br><br>

            @if ($user->privilege == '1')
                <strong>Privilege:</strong> User <br><br><br>
            @else
                <strong>Privilege:</strong> Admin <br><br><br>
            @endif

        </p>
    </div>

@endsection