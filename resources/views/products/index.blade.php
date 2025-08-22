@extends('layouts.master')
@section('content')
    <div class="container">
        <h1 class="my-4">Product Lists</h1>
        <a href="{{ route('products.create') }}" class="btn btn-outline-success mb-4 btn-sm">+ Create</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="bg-secondary text-white">ID</th>
                    <th class="bg-secondary text-white">NAME</th>
                    <th class="bg-secondary text-white">DESCRIPTION</th>
                    <th class="bg-secondary text-white">PRICE</th>
                    <th class="bg-secondary text-white">CATEGORY</th>
                    <th class="bg-secondary text-white">STATUS</th>
                    <th class="bg-secondary text-white">IMAGE</th>
                    <th class="bg-secondary text-white">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $data)
                    <tr>
                        <th>{{ $data['id'] }}</th>
                        <th>{{ $data['name'] }}</th>
                        <th>{{ $data['description'] }}</th>
                        <th>{{ $data['price'] }}</th>
                        <th>{{ $data['category']['name'] }}</th>
                        <th>
                            {{-- @if ($data->status === 1)
                                <span class="text-success">Active</span>
                            @else
                                <span class="text-danger">Suspend</span>
                            @endif --}}
                            <form action="{{ route('products.status', ['id' => $data->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm {{ $data->status === 1 ? "btn-success" : "btn-danger" }}">
                                    {{ $data->status === 1 ? "Active" : "Suspened"  }}
                                </button>
                            </form>
                        </th>
                        <th>
                            <img src="{{ asset('productImages/' . $data->image) }}" alt="{{ $data->image }}"
                                style="width: 50px; height: auto;" />
                        </th>
                        <th class="d-flex">
                            <a href="{{ route('products.edit', ['id' => $data->id]) }}"
                                class="btn btn-outline-secondary me-2 btn-sm">Edit</a>
                            <form action="{{ route('products.delete', $data->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-outline-danger btn-sm">Delete</button>
                            </form>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
