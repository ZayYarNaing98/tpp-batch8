@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="text-danger">
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
                Edit Category
            </div>
            <form action="{{ route('categories.update', [$category->id]) }}" method="POST">
                @csrf
                <div class="card-body">
                    <input type="text" name="name" value="{{ $category->name }}" class="form-control" />
                </div>
                <div class="card-body">
                    <img src="{{ asset('categoryImages/' . $category->image) }}" alt="{{ $category->image }}"
                        style="width: 50px; height: auto;" />
                </div>
                <div class="card-footer">
                    <button class="btn btn-outline-primary btn-sm me-2" type="submit">Update</button>
                    <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary btn-sm">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
