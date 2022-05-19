@extends('layouts.main')
@section('title', 'main')

@section('content')
    <h1 style="margin: 10px">Welcom to CRM</h1>


    @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Gate::check('admin') || \Illuminate\Support\Facades\Gate::check('admin2'))
        <h2>Добро пожаловать администратор</h2>
    @elseif(\Illuminate\Support\Facades\Auth::check())
        <h2>Добро пожаловать пользователь</h2>
    @else
        <h2>Войдите в систему, что бы получить доступ к остальным страницам</h2>
    @endif
    @error('non_authorize')
    <div class="alert alert-warning">{{ $message }}</div>
    @enderror
    @error('error_auth')
    <div class="alert alert-warning">{{ $message }}</div>
    @enderror

@endsection
