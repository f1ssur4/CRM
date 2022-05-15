@extends('layouts.main')
@section('title', 'login')

@section('content')
    <h1>Registration</h1>
    <div class="mb-2" style="width: 500px; margin-left: 20px; margin-top: 10px">
        <form action={{ route('user.create') }} method="POST">
            @csrf
        <label>Login</label>
        <input class="form-control" id="login" name="login">
            <div>
                @error('login')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        <label>Password</label>
        <input class="form-control" id="password" name="password">
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
           <p><div class="col-auto" style="margin-left: 350px">
                <button type="submit" class="btn btn-primary" style="width: 150px">Confirm identity</button>
            </div>
        </form>
    </div>
@endsection
