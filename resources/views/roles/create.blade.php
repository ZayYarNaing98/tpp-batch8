@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="card-header">Create Role</div>
        <form action="{{ route('roles.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <label for="name">NAME :</label>
                <input type="text" name="name" placeholder="Enter Role Nmae" class="form-control" />
            </div>
            <div class="card-body">
                @foreach ($permissions as $permission)
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" value="{{ $permission->id }}" name="permissions[]" />
                        <label for="permission{{ $permission->id }}" class="form-check-lable"> {{ $permission->name }} </label>
                    </div>
                @endforeach
            </div>
            <div class="card-footer mt-4">
                <button type="submit" class="btn btn-primary btn-sm">
                    +Create
                </button>
                <a href="{{ route('roles.index') }}" class="btn btn-secondary btn-sm">BACK</a>
            </div>
        </form>
    </div>
@endsection