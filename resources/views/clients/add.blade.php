@extends('layouts.main')
@section('title', 'Clients')

@section('content')

    <div style="margin: 20px">
        @error('add_client_success')
        <div class="alert alert-success">
            {{$message}}
        </div>
        @enderror
        <form action="{{route('clients.add')}}" method="post">
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
                    <label for="exampleFormControlTextarea1" class="form-label">Comment</label>
                    <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    @error('comment')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <select name="advertising">
                        <option selected disabled>choose advertising</option>
                        <option value="Facebook">Facebook</option>
                        <option value="Website">Website</option>
                        <option value="Friends">Friends</option>
                        <option value="Instagram">Instagram</option>
                    </select>
                    @error('advertising')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div style="margin-top: 10px;">
                    <select name="status_id">
                        <option selected disabled>choose status</option>
                        @foreach($statuses as $status)
                            <option value="@php echo $status->id @endphp">@php echo $status->title @endphp</option>
                            @endforeach
                    </select>
                    @error('status_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div style="margin-top: 10px;">
                    <select name="instructor_id">
                        <option selected disabled>choose instructor</option>
                        @foreach($instructors as $instructor)
                            <option value="@php echo $instructor->id @endphp">@php echo $instructor->name . ' ' . $instructor->surname . ' ' . $instructor->art->title@endphp</option>
                        @endforeach
                    </select>
                    @error('instructor_id')
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

