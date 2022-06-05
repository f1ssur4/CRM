@extends('layouts.main')
@section('title', 'Statistics')

@section('content')
    <div style="margin: 10px">
        <h2>Weekly statistics</h2>
        <table class="table" style="margin-top: 2em; width: auto">
            <thead>
            <tr>
                <th scope="col">Subscriptions</th>
                <th scope="col">Lessons</th>
                <th scope="col">Income</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>@php echo $statistics[0]->subscriptions @endphp</td>
                <td>@php echo $statistics[0]->lessons @endphp</td>
                <td>@php echo $statistics[0]->income @endphp</td>
            </tr>
            </tbody>
        </table>
        @error('statistics_cleanOff_success')
        <div class="alert alert-success">{{$message}}</div>
        @enderror
        <a class="btn btn-primary" href="{{route('statistics.clean-off')}}">Clear statistics</a>
        <a class="btn btn-primary" href='/statistics/convert'>Download statistics in PDF</a>
    </div>
@endsection

