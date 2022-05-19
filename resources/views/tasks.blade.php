@extends('layouts.main')
@section('title', 'Admin tasks')

@section('content')
    @php $i = 1;@endphp
    @error('non_authorize')
    <div class="alert alert-warning">{{ $message }}</div>
    @enderror
    <p><h1 style="margin-left: 10px">Table of daily tasks</h1>

    <a style="margin-left: 10px" class="btn btn-primary" href={{route('tasks.form')}}>Create new tasks</a>
    <table class="table" style="margin-top: 2em; width: auto">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Task</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
            <tr>
                <th scope="row">@php echo $i @endphp</th>
                <td>@php echo $task->content @endphp</td>
                <td>
                    <button class="btn btn-success">Ready</button>
                </td>
            </tr>
            @php $i += 1 @endphp
        @endforeach
        </tbody>
    </table>

@endsection

