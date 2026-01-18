<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function getAllUsers()
    {
        return User::all();
    }

    public function getUser($id)
    {
        return User::findOrFail($id);
    }
    public function edit($id)
    {
        return User::findOrFail($id);
    }

    public function createUser(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function updateUser($id, array $data)
{
    $user = User::findOrFail($id);

    $user->name = $data['name'];
    $user->email = $data['email'];

    if (!empty($data['password'])) {
        $user->password = Hash::make($data['password']);
    }

    $user->save();

    return $user;
}



    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        return $user->delete();
    }
}
