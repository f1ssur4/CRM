@extends('layouts.main')
@section('title', 'Requests')

@section('content')

    <p><h1 style="margin-left: 10px">Table of requests</h1>
    <div><table class="table" style="margin-left: 10px; width: 1200px">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col">Phone</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col">Additional info</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($requests as $request)
                <tr>
                    <td>@php echo $request->name .' '. $request->surname @endphp</td>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <td>@php echo $request->phone @endphp</td>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <td>@php echo $request->info @endphp</td>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <td><a class="btn btn-warning" href="/requests/delete/@php echo $request->id @endphp">Processed</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @error('delete_request_success')
        <div class="alert alert-success">{{$message}}</div>
        @enderror
    </div>

@endsection

