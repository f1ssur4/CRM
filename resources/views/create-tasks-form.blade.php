@extends('layouts.main')
@section('title', 'Admin tasks')

@section('content')

    <div class="row" style="margin: 20px; width: 1000px">
        <form action="{{route('tasks.create')}}" method="POST">
            @csrf
            <div class="col">
                <textarea class="form-control" placeholder="Description task" aria-label="Description task"
                          name="content"></textarea>
            </div>
            <select style="margin-top: 5px" name="performer">
                <option value="everybody">everybody</option>
            @foreach($users as $user)
                    <option value=@php echo $user @endphp>@php echo $user @endphp</option>
                @endforeach
            </select>
            <button style="margin-top: 5px" type="submit" class="btn btn-success">Add</button>
        </form>
    </div>
    @error('content')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @error('create_task_error')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @error('create_task_success')
    <div class="alert alert-success">{{ $message }}</div>
    @enderror

@endsection

