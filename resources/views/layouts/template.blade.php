<!DOCTYPE html>
<html lang="en">
<head>
    <title>Blogs</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <link href="{{ asset('css/blog.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/blog.js') }}" type="text/javascript"></script>

</head>
<body>
<div class="container">

    <nav class="navbar navbar-inverse">

        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('blogs') }}">View All Blogs</a></li>
            <li><a href="{{ URL::to('blogs/create') }}">Create a Blog</a>
        </ul>


        <div class="navbar-header float-right blog-header">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="navbar-brand">
                @csrf
                <input type="submit" value="Logout" class="btn btn-sm float-right">
            </form>
        </div>

    </nav>

    @yield('content')

</div>
</body>
</html>