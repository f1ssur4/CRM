@extends('layouts.main')
@section('title', 'Lessons')

@section('content')
    @if(\Illuminate\Support\Facades\Gate::check('admin1') || \Illuminate\Support\Facades\Gate::check('admin2'))
        <div style="margin-left: 100px; margin-top: 45px;">
        <h3><b>Записать клиента на урок</b></h3>
        <form action="{{route('lessons.add')}}" method="post">
            @csrf
            <input name="date" type="date">
            @error('date')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input name="time" type="time">
            @error('time')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <select name="client_id">
                <option selected hidden>choose client</option>
                @foreach($clients as $client)
                    <option
                        value="@php echo $client->id @endphp">@php echo $client->name . ' ' . $client->surname @endphp</option>
                @endforeach
            </select>
            @error('client_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button class="btn btn-primary" type="submit">Записать</button>
        </form>
        @error('add_lesson_success')
        <div class="alert alert-success">{{$message}}</div>
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
                    <td>@php echo $lesson->date . ' ' . $lesson->time @endphp</td>
                    <td>@php echo $lesson->client->subscriptions->last()->minutes . 'min'  @endphp</td>
                    <form action="{{route('lessons.delete')}}" method="post">
                        @csrf
                    <td><button name="id" value="@php echo $lesson->id@endphp">Удалить урок</button></td>
                    </form>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
