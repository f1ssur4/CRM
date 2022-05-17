@extends('layouts.main')
@section('title', 'main')

@section('content')
    <h1>Main page</h1>
    <h2 style="color: @php echo session()->get('color') @endphp">@php echo session()->get('admin') @endphp</h2>
@endsection
