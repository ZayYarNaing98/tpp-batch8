@extends('layouts.master')
@section('content')
    <div class="container">
        <h1 class="mt-4">Category List</h1>
        @can('categoryCreate')
            <a href="{{ route('categories.create') }}" class="btn btn-outline-success my-4 btn-sm">+Create</a>
        @endcan
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="bg-secondary text-white">ID</th>
                    <th class="bg-secondary text-white">NAME</th>
                    <th class="bg-secondary text-white">IMAGE</th>
                    <th class="bg-secondary text-white">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td> {{ $category['id'] }} </td>
                        <td> {{ $category['name'] }} </td>
                        <td>
                            <img src="{{ asset('categoryImages/' . $category->image) }}" alt="{{ $category->image }}"
                                style="width: 50px; height: auto;" />
                        </td>
                        <td class="d-flex">
                            @can('categoryUpdate')
                                <a href="{{ route('categories.edit', ['id' => $category->id]) }}"
                                    class="btn btn-outline-secondary btn-sm">edit</a>
                            @endcan
                            @can('categoryDelete')
                                <form action="{{ route('categories.delete', ['id' => $category->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger ms-2 btn-sm">Delete</button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
