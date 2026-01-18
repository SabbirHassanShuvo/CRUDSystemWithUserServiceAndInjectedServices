@extends('layouts.app')

@section('content')
    <h2>Create User</h2>
    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        <input type="text" name="name" placeholder="Name" value="{{ old('name') }}">
        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
        <input type="password" name="password" placeholder="Password">
        <input type="password" name="password_confirmation" placeholder="Confirm Password">
        <button type="submit">Create</button>
    </form>
@endsection
