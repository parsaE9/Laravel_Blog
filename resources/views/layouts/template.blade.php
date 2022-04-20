<!DOCTYPE html>
<html lang="en">
<head>
    <title>Blogs</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

    <nav class="navbar navbar-inverse">

        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('blogs') }}">View All sharks</a></li>
            <li><a href="{{ URL::to('blogs/create') }}">Create a shark</a>
        </ul>

        <div class="navbar-header float-lg-right">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="navbar-brand">
                @csrf
                <input type="submit" value="Logout" class="btn btn-dark float-lg-right">
            </form>
        </div>

    </nav>

    @yield('content')

</div>
</body>
</html>