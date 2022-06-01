@extends('layouts.main')
@section('title', 'Lessons')

@section('content')
    @if(\Illuminate\Support\Facades\Gate::check('admin1') || \Illuminate\Support\Facades\Gate::check('admin2'))
        <div style="margin-left: 100px; margin-top: 45px;">
        <h3><b>Register a client for a lesson</b></h3>
        <form action="{{route('lessons.add')}}" method="post">
            @csrf
            <input name="start_time" type="datetime-local">
            @error('start_time')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <select name="client_id">
                <option selected hidden>choose client</option>
                @foreach($clients as $client)
                    <option
                        value="@php echo $client[0]->id @endphp">@php echo $client[0]->name . ' ' .$client[0]->surname @endphp</option>
                @endforeach
            </select>
            @error('client_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button class="btn btn-primary" type="submit">Register</button>
        </form>
        @error('add_lesson_success')
        <div class="alert alert-success">{{$message}}</div>
        @enderror
            @error('delete_lesson_success')
        <div class="alert alert-warning">{{$message}}</div>
        @enderror
    </div>
    @endif
    <p><h1 style="margin-left: 10px">Table of lessons</h1>
    <div>
        <table class="table" style="margin-left: 10px; width: auto">
            <thead>
            <tr>
                <th scope="col">Client Name</th>
                <th scope="col">Instructor</th>
                <th scope="col">Art</th>
                <th scope="col">School</th>
                <th scope="col">Start time</th>
                <th scope="col">Length</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($lessons as $lesson)
                <tr>
                    <td>@php echo $lesson->client->name .' '. $lesson->client->surname @endphp</td>
                    <td>@php echo $lesson->client->instructor->name .' '. $lesson->client->instructor->surname   @endphp</td>
                    <td>@php echo $lesson->client->instructor->art->title @endphp</td>
                    <td>@php echo $lesson->client->instructor->art->school->address @endphp</td>
                    <td>@php echo $lesson->start_time @endphp</td>
                    <td>@php echo $lesson->client->subscriptions->last()->minutes . 'min'  @endphp</td>
                    @if(\Illuminate\Support\Facades\Gate::check('admin1') || \Illuminate\Support\Facades\Gate::check('admin2'))

                    <form action="{{route('lessons.delete')}}" method="post">
                        @csrf
                    <td><button name="id" value="@php echo $lesson->id@endphp">Delete lesson</button></td>
                    </form>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
