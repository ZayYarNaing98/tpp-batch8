<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function index()
    {
        return User::get();
    }

    public function store($validatedData)
    {
        return User::create($validatedData);
    }

    public function show($id)
    {
        return User::where('id', $id)->first();
    }

    public function update($validatedData, $id)
    {
        $user = User::where('id', $id)->first();

        return $user->update($validatedData);
    }

    public function destroy($id)
    {
        $user = User::find($id);

        return $user->delete();
    }

}
