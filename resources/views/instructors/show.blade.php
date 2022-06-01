@extends('layouts.main')
@section('title', 'Instructor')

@section('content')
    <a class="btn btn-primary" style="margin-left: 20px" href="{{route('instructors.index')}}">Back to list</a>
    <div>
        <table class="table" style="margin-top: 2em; width: 900px; margin-left: 250px; size: 1000px">
            <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Name</th>
                <th scope="col">Surname</th>
                <th scope="col">Phone</th>
                <th scope="col">Art</th>
                <th scope="col">School</th>
            </tr>
            </thead>
            <tbody>
            <form action="{{route('instructors.update')}}" method="POST">
                @csrf
                <tr>
                    <td><input hidden name="id" value="@php echo $instructor->id @endphp"></td>
                    <td> @php echo $instructor->name @endphp</td>
                    <td> @php echo $instructor->surname @endphp</td>
                    <td><input name="phone" value="@php echo $instructor->phone @endphp"></td>
                    <td>
                        <a href="/arts/@php echo $instructor->art->id @endphp">@php echo $instructor->art->title @endphp</a>
                    </td>
                    <td>@php echo $instructor->art->school->address @endphp</td>
                    <td>
                        <button class="btn btn-primary" type="submit">Обновить</button>
                    </td>
                </tr>
                @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </tbody>
        </table>
        <div class="mb-3" style="width: 1000px; margin-left: 200px">
            <label for="exampleFormControlTextarea1" class="form-label"><b>Description</b></label>
            <textarea class="form-control" name="description"
                      rows="4">@php echo $instructor->description @endphp</textarea>
            </form>
            <div style="margin-top: 50px">
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @error('update_client_success')
                <div class="alert alert-success">{{ $message }}</div>
                @enderror
                @error('update_client_error')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
@endsection
