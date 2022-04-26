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
            @if (Auth::user()->privilege === '1')
                <li><a href="{{ URL::to('user_blogs') }}">View User Blogs</a></li>
                <li><a href="{{ URL::to('user_blogs/create') }}">Create a Blog</a>
            @else
                <li><a href="{{ URL::to('admin_blogs') }}">View All Blogs</a></li>
            @endif
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