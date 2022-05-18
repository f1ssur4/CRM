@extends('layouts.main')
@section('title', 'create')

@section('content')
    <h1 style="margin: 10px">Create new user</h1>
    <div class="mb-2" style="width: 500px; margin-left: 20px; margin-top: 10px">
        <form action={{ route('admin.create') }} method="POST">
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
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="isAdmin" name="isAdmin">
                <label class="form-check-label" for="isAdmin">
                    Administrator
                </label>
            </div>
            <p>
            <div class="col-auto" style="margin-left: 350px">
                <button type="submit" class="btn btn-primary" style="width: 150px">Create</button>
            </div>
            @error('user_created')
            <div class="alert alert-success">{{ $message }}</div>
            @enderror
            @error('create_error')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </form>
    </div>
@endsection
