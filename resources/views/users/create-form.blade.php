@extends('layouts.main')
@section('title', 'Users')

@section('content')
    <h1 style="margin: 10px">Create new user</h1>
    <div class="mb-2" style="width: 500px; margin-left: 20px; margin-top: 10px">
        <form action={{ route('users.create') }} method="POST">
            @csrf
            <label>Login</label>
            <input class="form-control" id="login" name="login">
            <div>
                @error('login')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <label>Password</label>
            <input class="form-control" id="password" type="password" name="password">
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <select style="margin-top: 5px" name="auth_id">
                <option selected value="0">User</option>
                <option value="1">Admin</option>
                <option value="2">Main Admin</option>
            </select>
            @error('status_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <p>
            <div class="col-auto" style="margin-left: 350px">
                <button type="submit" class="btn btn-primary" style="width: 150px">Create</button>
            </div>
        </form>
        @error('create_user_success')
        <div class="alert alert-success">{{ $message }}</div>
        @enderror
        @error('create_user_error')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
@endsection
