@extends('admin.master')

@section('title', 'Categories | ' . env('APP_NAME'))

@section('content')

    <h1 class="h3 mb-4 text-gray-800">All Products</h1>

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

    <form action="{{ route('admin.products.index') }}" method="get">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search here..." name="q" value="{{ request()->q }}">
            <button class="btn btn-dark px-5" id="button-addon2">Search</button>
        </div>
    </form>

    <table class="table table-bordered">
        <thead>

            <tr class="bg-dark text-white">
                <th>ID</th>
                <th>Nmae</th>
                <th>Image</th>
                <th>price</th>
                <th> Sale Price</th>
                <th>Quantity</th>
                <th>Category</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->trans_name }}</td>
                    <td><img width="80" src="{{ asset('uploads/products/' . $product->image) }}"></td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->sale_price }}</td>
                    <td>{{ $product->quantity }}</td>
                    {{-- <td>{{ $product->category_id }}</td> --}}
                    <td>{{ $product->category->trans_name }}</td>
                    <th>{{ $product->created_at ? $product->created_at->diffForHumans() : '' }}</th>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.products.edit', $product->id) }}"><i
                                class="fa fa-edit"></i></a>
                        <form class="d-inline" action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
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
    {{-- {{ $products->links() }} --}}
    {{ $products->appends($_GET)->links() }}

@stop
