@extends('layouts.main')
@section('title', 'Instructors')

@section('content')

    <p><h1 style="margin-left: 10px">Table of instructors</h1>
    <div><table class="table" style="margin-left: 10px; width: auto">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Art</th>
                <th scope="col">School</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($instructors as $instructor)
                <tr>
                    <td>@php echo $instructor->name .' '. $instructor->surname @endphp</td>
                    <td>@php echo $instructor->phone @endphp</td>
                    <td>@php echo $instructor->art->title @endphp</td>
                    <td>@php echo $instructor->art->school->address @endphp</td>
                    <td><a href="/instructors/@php echo $instructor->id @endphp">посмотреть учителя</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
