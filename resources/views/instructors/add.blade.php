@extends('layouts.main')
@section('title', 'Instructors')

@section('content')

    <div style="margin: 20px">
        @error('add_instructor_success')
        <div class="alert alert-success">
            {{$message}}
        </div>
        @enderror
        <form action="{{route('instructors.add')}}" method="post">
            @csrf
            <div style="width: 500px;">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input name="name" class="form-control" id="exampleFormControlInput1">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Surname</label>
                    <input name="surname" class="form-control" id="exampleFormControlInput1">
                    @error('surname')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Phone</label>
                    <input name="phone" class="form-control" id="exampleFormControlInput1">
                    @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <select name="art_id">
                        <option selected disabled>choose art</option>
                        @foreach($arts as $art)
                            <option value="@php echo $art->id @endphp">@php echo $art->title @endphp</option>
                        @endforeach
                    </select>
                    @error('art_id')
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

