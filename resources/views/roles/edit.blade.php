@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header"></div>
            <form action="" method="POST">
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
            </form>
        </div>
    </div>
@endsection
