@extends('layouts.main')
@section('title', 'Info')

@section('content')

    <div style="float: left; width: auto; margin-left: 100px">
        <h3><b>Arts</b></h3>
        <table class="table" style="margin-top: 2em; width: auto">
            <thead>
            <tr>
                <th scope="col">Title</th>
            </tr>
            </thead>
            <tbody>
            @foreach($arts as $art)
                <tr>
                    <td>@php echo $art->title @endphp</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <h3><b>Statuses</b></h3>
        <table class="table" style="margin-top: 2em; width: auto; margin-bottom: 100px">
            <thead>
            <tr>
                <th scope="col">Title</th>
            </tr>
            </thead>
            <tbody>
            @foreach($statuses as $status)
                <tr>
                    <td>@php echo $status->title @endphp</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <h3><b>Users</b></h3>
        <table class="table" style="margin-top: 2em; width: auto; margin-bottom: 100px">
            <thead>
            <tr>
                <th scope="col">User</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>@php echo $user->login @endphp</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div style="float: right; width: 600px; margin-right: 100px">
        <h3><b>Schools</b></h3>
        <table class="table" style="margin-top: 2em; width: auto">
            <thead>
            <tr>
                <th scope="col">Address</th>
            </tr>
            </thead>
            <tbody>
            @foreach($schools as $school)
                <tr>
                    <td>@php echo $school->address @endphp</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <h3><b>Subscriptions</b></h3>
        <table class="table" style="margin-top: 2em; width: auto; margin-bottom: 100px">
            <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Minutes</th>
                <th scope="col">Count Lessons</th>
                <th scope="col">Price</th>
            </tr>
            </thead>
            <tbody>
            @foreach($subscriptions as $subscription)
                <tr>
                    <td>@php echo $subscription->title @endphp</td>
                    <td>@php echo $subscription->minutes @endphp</td>
                    <td>@php echo $subscription->count_lessons @endphp</td>
                    <td>@php echo $subscription->price @endphp</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
