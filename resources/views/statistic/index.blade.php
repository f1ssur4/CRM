@extends('layouts.main')
@section('title', 'Statistic')

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
                <td>@php echo $statistic[0]->subscriptions @endphp</td>
                <td>@php echo $statistic[0]->lessons @endphp</td>
                <td>@php echo $statistic[0]->income @endphp</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection

