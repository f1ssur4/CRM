@extends('layouts.main')
@section('title', 'Schools')

@section('content')

    <div style="margin: 20px">
        @error('add_school_success')
        <div class="alert alert-success">
            {{$message}}
        </div>
        @enderror
        @error('add_school_error')
        <div class="alert alert-danger">
            {{$message}}
        </div>
        @enderror
        <form action="{{route('schools.add')}}" method="post">
            @csrf
            <div style="width: 500px;">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Address</label>
                    <input required name="address" class="form-control" id="exampleFormControlInput1">
                    @error('address')
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

