@extends('layouts.main')
@section('title', 'Status')

@section('content')

    <div style="margin: 20px">
        @error('add_status_success')
        <div class="alert alert-success">
            {{$message}}
        </div>
        @enderror
        @error('add_status_error')
        <div class="alert alert-danger">
            {{$message}}
        </div>
        @enderror
        <form action="{{route('statuses.add')}}" method="post">
            @csrf
            <div style="width: 500px;">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                    <input required name="title" class="form-control" id="exampleFormControlInput1">
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div style="margin-top: 10px">
                    <button class="btn btn-success" type="submit">Add</button>
                </div>
            </div>
        </form>
    </div>

@endsection

