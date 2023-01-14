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
                        <button class="btn btn-sm btn-danger btn-delete"><i class="fas fa-trash"></i></button>
                        <form class="d-inline" action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            {{-- <button class="btn btn-sm btn-danger" />// لانوا ال form هنا بيؤسل على السريع فالأفضل عشان يعمل alert بخرجه خارج الكودد
                                onclick="return confirm ('Are you sure you want to delete this')"><i
                                    class="fas fa-trash"></i></button> --}}
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

    <script>
        $('.btn-delete').on('click', function() {

            let form = $(this).next('form');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        });
    </script>
@stop
