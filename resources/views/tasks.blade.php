@extends('layouts.main')
@section('title', 'Admin tasks')

@section('content')
    @php $i = 1;@endphp
    @error('non_authorize')
    <div class="alert alert-warning">{{ $message }}</div>
    @enderror
    <p><h1 style="margin-left: 10px">Table of daily tasks</h1>
    @if(\Illuminate\Support\Facades\Gate::check('admin2'))
    <a style="margin-left: 10px" class="btn btn-primary" href={{route('tasks.form')}}>Create new tasks</a>
    @endif
    <table class="table" style="margin-top: 2em; width: auto">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Task</th>
            <th scope="col">For</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <form action="{{route('tasks.ready')}}" method="POST">
            @csrf
            @foreach($tasks as $task)
                <tr>
                    <th scope="row">@php echo $i @endphp</th>
                    <td>@php echo $task->content @endphp</td>
                    <td>@php echo $task->performer @endphp</td>
                    <td>
                        <button class="btn btn-success" name="id" value="@php echo $task->id @endphp" type="submit">Ready</button>
                    </td>
                </tr>
                @php $i += 1 @endphp
            @endforeach
        </form>
        </tbody>
    </table>

@endsection

