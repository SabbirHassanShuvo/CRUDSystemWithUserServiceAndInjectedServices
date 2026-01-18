@extends('layouts.app')

@section('content')
    <h2>Edit User</h2>
    <form method="POST" action="{{ route('users.update', $user->id) }}">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ old('name', $user->name) }}">
        <input type="email" name="email" value="{{ old('email', $user->email) }}">
        <input type="password" name="password" placeholder="New Password (optional)">
        <input type="password" name="password_confirmation" placeholder="Confirm Password">
        <button type="submit">Update</button>
    </form>
@endsection
