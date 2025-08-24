@extends('layouts.master')
@section('content')
    <div class="container mt-4">
        <div class="text-danger">
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <div class="card">
            <div class="card-header">
                + Category Create
            </div>
            <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <input type="text" class="form-control" placeholder="Enter Category Name" name="name" />
                </div>
                <div class="card-body">
                    <input type="file" class="form-control" name="image" />
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                        + Create
                    </button>
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary btn-sm ms-2">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
