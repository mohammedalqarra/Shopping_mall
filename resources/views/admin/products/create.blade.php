@extends('admin.master')

@section('title', 'Add new Products | ' . env('APP_NAME'))

@section('content')

    <h1 class="h3 mb-4 text-gray-800">Create new Products</h1>

    @if (session('msg'))
        <div class="alert alert-{{ seesion('type') }}">
            {{ seesion('msg') }}
        </div>
    @endif
    @include('admin.errors')

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label>English name</label>
                    <input type="text" name="name_en" placeholder="English name" class="form-control" />
                </div>
            </div>
            <diuv class="col-md-6">
                <div class="mb-3">
                    <label>Arabic name</label>
                    <input type="text" name="name_ar" placeholder="Arabic name" class="form-control" />
                </div>
            </diuv>
        </div>
        <div class="mb-3">
            <label for="image">Image</label>
            <input type="file" id="image" name="image" class="form-control" />
            {{-- <label for="image"><img src="https://placekitten.com/120" alt=""></label>
            <input type="file" id="image" name="name_en" class="form-control d-none" />
             --}}
        </div>
        <div class="mb-3">
            <label>Album</label>
            <input type="file" name="album[]" multiple class="form-control" />
        </div>
        <div class="mb-3">
            <label> English content</label>
            <textarea name="content_en" placeholder="English content" class="myeditor" rows="10"></textarea>
        </div>
        <div class="mb-3">
            <label>Arabic content</label>
            <input type="text" name="content_ar" placeholder="Arabic content" class="myeditor" />
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label>Price</label>
                    <input type="text" name="price" placeholder="price" class="form-control" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label>Sale Price</label>
                    <input type="text" name="sale_price" placeholder="sale_price" class="form-control" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label>Quantity</label>
                    <input type="text" name="quantity" placeholder="Quantity" class="form-control" />
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label>Category</label>
            <select name="category_id" class="form-control">
                <option value="">Select</option>
                @foreach ($categories as $item)
                    {{-- <option value="{{ $Category->id }}">{{ $Category->name }}</option> --}}
                    <option value="{{ $item->id }}">{{ $item->trans_name }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-success px-5">Add</button>
    </form>
@stop


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.3.1/tinymce.min.js"
        integrity="sha512-eV68QXP3t5Jbsf18jfqT8xclEJSGvSK5uClUuqayUbF5IRK8e2/VSXIFHzEoBnNcvLBkHngnnd3CY7AFpUhF7w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        tinymce.init({
            selector: '.myeditor'
        });
    </script>
@stop
