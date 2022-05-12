@extends('layouts.template')

@section('content')

    <h1>Admins</h1>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>Date Created</td>
            <td>Date Edited</td>
            <td>Username</td>
            <td>Email</td>
            <td>Actions</td>
        </tr>
        </thead>
        <tbody>
        @foreach($admins as $key => $value)
            <tr>
                <td>{{ jdate()::fromCarbon($value->created_at)->format('Y/m/d H:i:s') }}</td>
                <td>{{ jdate()::fromCarbon($value->updated_at)->format('Y/m/d H:i:s') }}</td>
                <td>{{ $value->username }}</td>
                <td>{{ $value->email }}</td>

                <td>
                    @if (Auth::user()->privileges->admin_delete)
                        <form action="{{ route('admins.destroy', $value->id) }}" method="POST" class="pull-right">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button class="btn btn-warning ">Delete Admin</button>
                        </form>
                    @endif

                    @if (Auth::user()->privileges->admin_edit)
                        <a class="btn btn-small btn-info" href="{{ URL::to('admins/' . $value->id . '/edit') }}">Edit
                            this Admin</a>
                    @endif

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $admins->links() }}
@endsection