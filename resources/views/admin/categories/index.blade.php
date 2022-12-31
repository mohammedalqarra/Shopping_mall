@extends('admin.master')

@section('title', 'Categories | ' . env('APP_NAME'))

@section('content')

    <h1 class="h3 mb-4 text-gray-800">All Categories</h1>

    {{-- @if (session('fail'))
        <div class="alert alert-danger">
            {{ seesion('fail') }}
        </div>
    @endif

    @if (session('succes'))
        <div class="alert alert-succes">
            {{ seesion('succes') }}
        </div>
    @endif --}}

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
                <th>Image</th>
                <th>Parent</th>
                <th>Created At</th>
                <th>Actions</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td><img width="80" src="{{ asset('uploads/categories/' . $category->image) }}"></td>
                    <td>{{ $category->parent_id }}</td>
                    <th>{{ $category->created_at ? $category->created_at->diffForHumans() : '' }}</th>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.categories.edit', $category->id) }}"><i
                                class="fa fa-edit"></i></a>
                        <form class="d-inline" action="{{ route('admin.categories.destroy', $category->id) }}"
                            method="POST">
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
@stop
