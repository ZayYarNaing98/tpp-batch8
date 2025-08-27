@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header"></div>
            <form action="{{ route('roles.update', $role->id) }}" method="POST">
                @csrf
                {{ method_field('PUT') }}
                <div class="card-body">
                    <label for="name">NAME :</label>
                    <input type="text" name="name" class="form-control" value="{{ $role->name }}" />
                </div>
                <div class="card-body">
                    @foreach ($permissions as $permission)
                        <div class="my-4">
                            <input type="checkbox" class="form-check-input ms-2" value="{{ $permission->id }}"
                                name="permissions[]" @if (in_array($permission->id, $rolePermissions)) checked @endif />
                            <label for="permission{{ $permission->id }}" class="form-check-label ms-4"> {{ $permission->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary me-2 btn-sm" type="submit">Update</button>
                    <a href="{{ route('roles.index') }}" class="btn btn-secondary btn-sm">BACK</a>
                </div>
            </form>
        </div>
    </div>
@endsection
