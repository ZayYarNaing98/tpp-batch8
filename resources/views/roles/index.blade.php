@extends('layouts.master')
@section('content')
    <div class="container">
        <h1 class="mt-4">Role List</h1>
        <a href="{{ route('roles.create') }}" class="btn btn-success my-4 btn-sm" >+Create</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="bg-secondary text-white">ID</th>
                    <th class="bg-secondary text-white">NAME</th>
                    <th class="bg-secondary text-white">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role['id'] }}</td>
                        <td>{{ $role['name'] }}</td>
                        <td class="d-flex">
                            <a href="{{ route('roles.edit', ['role' => $role->id]) }}" class="btn btn-outline-secondary btn-sm me-2">EDIT</a>
                            <form action="{{ route('roles.destroy', ['role' => $role->id ]) }}" method="POST">
                                {{ method_field('DELETE') }}
                                @csrf
                                <button type="submit" class="btn btn-outline-danger btn-sm">DELETE</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection