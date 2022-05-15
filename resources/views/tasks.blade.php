@extends('layouts.main')
@section('title', 'Admin tasks')

@section('content')
@php $i = 1;@endphp

<p><h1 style="margin-left: 10px">Table of daily tasks</h1>
Цвет Anna @php echo session('colorAnna')@endphp

<table class="table" style="margin-top: 2em">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Task</th>
        <th scope="col"></th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    @foreach($tasks as $task)
    <tr>
        <th scope="row">@php echo $i @endphp</th>
        <td>@php echo $task->content @endphp</td>
        <td><button class="btn btn-primary">In process</button></td>
        <td><button class="btn btn-success">Ready</button></td>
    </tr>
    @php $i += 1 @endphp
    @endforeach
    </tbody>
</table>
@endsection

