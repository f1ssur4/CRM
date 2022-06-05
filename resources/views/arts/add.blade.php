@extends('layouts.main')
@section('title', 'Arts')

@section('content')

    <div style="margin: 20px">
        @error('add_art_success')
        <div class="alert alert-success">
            {{$message}}
        </div>
        @enderror
        @error('add_art_error')
        <div class="alert alert-danger">
            {{$message}}
        </div>
        @enderror
        <form action="{{route('arts.add')}}" method="post">
            @csrf
            <div style="width: 500px;">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                    <input name="title" class="form-control" id="exampleFormControlInput1">
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <select name="school_id">
                        <option selected disabled>choose school</option>
                        @foreach($schools as $school)
                            <option value="@php echo $school->id @endphp">@php echo $school->address @endphp</option>
                        @endforeach
                    </select>
                    @error('school_id')
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

