@extends('layouts.main')
@section('title', 'Main')

@section('content')
    <h1 style="margin: 10px">Welcom to CRM</h1>


    @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Gate::check('admin1') || \Illuminate\Support\Facades\Gate::check('admin2'))
        <h2>Добро пожаловать администратор</h2>
    @elseif(\Illuminate\Support\Facades\Auth::check())
        <h2>Welcome user</h2>
    @else
        <h2>Log in to access the rest of the pages</h2>
    @endif
    @error('non_authorize')
    <div class="alert alert-warning">{{ $message }}</div>
    @enderror
    @error('error_auth')
    <div class="alert alert-warning">{{ $message }}</div>
    @enderror
    @error('login_success')
    <div class="alert alert-success">{{ $message }}</div>
    @enderror
    @error('logout_success')
    <div class="alert alert-success">{{ $message }}</div>
    @enderror

@endsection
