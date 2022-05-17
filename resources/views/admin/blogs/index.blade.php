@extends('layouts.template')

@section('content')

    <h1>All the blogs</h1>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>Date Created</td>
            <td>Date Edited</td>
            <td>title</td>
            <td>short description</td>
            <td>Actions</td>
        </tr>
        </thead>
        <tbody>
        @foreach($blogs as $key => $value)
            <tr>
                <td>{{ jdate()::fromCarbon($value->created_at)->format('Y/m/d H:i:s') }}</td>
                <td>{{ jdate()::fromCarbon($value->updated_at)->format('Y/m/d H:i:s') }}</td>
                <td>{{ $value->title }}</td>
                <td>{{ $value->short_description }}</td>

                <td>
                    @if (authorize_action('blog_delete'))
                        <form action="{{ route('admin_blogs.destroy', $value->id) }}" method="POST" class="pull-right">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button class="btn btn-warning ">Delete Blog</button>
                        </form>
                    @endif
                    @if (authorize_action('blog_edit'))
                        <a class="btn btn-small btn-info" href="{{ URL::to('admin_blogs/' . $value->id . '/edit') }}">Edit
                            this Blog</a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $blogs->links() }}
@endsection