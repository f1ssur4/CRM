@extends('layouts.main')
@section('title', 'Clients')

@section('content')
    <p><h1 style="margin-left: 10px">Table of arts</h1>
    <div><table class="table" style="margin-top: 2em; width: auto">
        <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">School</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
            @foreach($arts as $art)
                <tr>
                    <td>@php echo $art->title @endphp</td>
                    <td>@php echo $art->school->address @endphp</td>
                    <td><a href="/arts/@php echo $art->id @endphp">посмотреть</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>

@endsection

