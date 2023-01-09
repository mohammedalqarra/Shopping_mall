@extends('admin.master')

@section('title', 'Users | ' . env('APP_NAME'))

@section('content')

    <h1 class="h3 mb-4 text-gray-800">All Users</h1>


    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr class="bg-dark text-white">
                <th>ID</th>
                <th>Nmae</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <th>{{ $user->created_at ? $user->created_at->diffForHumans() : '' }}</th>
                    <td>

                        <form class="d-inline" action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-danger"
                                onclick="return confirm ('Are you sure you want to delete this')"><i
                                    class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
@stop
