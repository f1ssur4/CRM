@extends('layouts.main')
@section('title', 'Subscription')

@section('content')

    <div style="margin: 20px">
        @error('add_subscription_success')
        <div class="alert alert-success">
            {{$message}}
        </div>
        @enderror
        <form action="{{route('subscriptions.add')}}" method="post">
            @csrf
            <div style="width: 500px;">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                    <input name="title" class="form-control" id="exampleFormControlInput1">
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Minutes</label>
                    <input name="minutes" class="form-control" id="exampleFormControlInput1">
                    @error('minutes')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Count Lessons</label>
                    <input name="count_lessons" class="form-control" id="exampleFormControlInput1">
                    @error('count_lessons')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Price</label>
                    <input name="price" class="form-control" id="exampleFormControlInput1">
                    @error('price')
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

