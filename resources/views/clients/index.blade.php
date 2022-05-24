@extends('layouts.main')
@section('title', 'Clients')

@section('content')
    <p><h1 style="margin-left: 10px">Table of clients</h1>
    <div><table class="table" style="margin-top: 2em; width: auto">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Advertising</th>
            <th scope="col">Status</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
                <tr>
                    <th scope="row">@php echo $client->id @endphp</th>
                    <td>@php echo $client->name .' '. $client->surname @endphp</td>
                    <td>@php echo $client->phone @endphp</td>
                    <td>@php echo $client->advertising @endphp</td>
                    <td>@php echo $client->status->title @endphp</td>
                    <td><a href="/clients/@php echo $client->id @endphp">посмотреть клиента</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
        {{$clients->links()}}
    </div>

@endsection

