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
            {{--<td>shark Level</td>--}}
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
                {{--<td>{{ $value->shark_level }}</td>--}}

                <td>
                    <form action="{{ route('blogs.destroy', $value->id) }}" method="POST" class="pull-right">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button class="btn btn-warning ">Delete Blog</button>
                    </form>

                    <a class="btn btn-small btn-success" href="{{ URL::to('blogs/' . $value->id) }}">Show this
                        Blog</a>

                    <a class="btn btn-small btn-info" href="{{ URL::to('blogs/' . $value->id . '/edit') }}">Edit this
                        Blog</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $blogs->links() }}
@endsection