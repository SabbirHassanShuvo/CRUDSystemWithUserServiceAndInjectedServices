<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    protected UserService $userService;

    public function __construct(UserService $userService){
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->getAllUsers();
        return view('users.index', compact('users'));
    }


    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $this->userService->createUser($request->all());
        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }

    public function edit($id){
        $user = $this->userService->edit($id);
        return view('users.edit', compact('user'));
    }

    // user update
public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
        'password' => 'nullable|string|min:6|confirmed',
    ]);

    // FIXED ORDER
    $this->userService->updateUser($id, $request->all());

    return redirect()
        ->route('users.index')
        ->with('success', 'User updated successfully!');
}


    public function destroy($id)
    {
        $this->userService->deleteUser($id);
        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }
}
