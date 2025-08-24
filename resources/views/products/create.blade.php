@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="mt-4 text-danger">
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <div class="card mt-4">
            <div class="card-header">
                + Create Category
            </div>
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <label for="name" class="form-label">Name :</label>
                    <input type="text" name="name" placeholder="Enter Product Name" class="form-control mb-2">
                </div>
                <div class="card-body">
                    <label for="description" class="form-label">Description :</label>
                    <input type="text" name="description" placeholder="Enter Product Description"
                        class="form-control mb-2">
                </div>
                <div class="card-body">
                    <label for="price" class="form-label">Price :</label>
                    <input type="text" name="price" placeholder="Enter Product Price" class="form-control mb-2">
                </div>
                <div class="card-body">
                    <label for="" class="form-label me-4">Active or Inactive :</label>
                    <input type="checkbox" class="form-check-input mb-2" name="status" role="switch" checked />
                </div>
                <div class="card-body">
                    <label for="category" class="form-label">Catgory :</label>
                    <select name="category_id" id="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="card-body">
                    <label for="image" class="form-label">Uploda Your Product Image :</label>
                    <input type="file" class="form-control" name="image" />
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm me-2">+Create</button>
                    <a href="{{ route('products.index') }}" class="btn btn-secondary btn-sm">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
