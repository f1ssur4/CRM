@extends('layouts.main')
@section('title', 'Clients')

@section('content')
    <p><h1 style="margin-left: 10px">Table of clients</h1>
    <div style="margin: 50px">
        <form action="{{route('clients.sort')}}" method='post'>
            @csrf
        <select name="sortItem">
            <option disabled selected >выберете сортировку</option>
            <option value="id" >default</option>
            <option value="status_id">По статусу</option>
            <option value="advertising">По рекламе</option>
            <option value="name">По имени</option>
            <option value="created_at">По дате добавления</option>
        </select>
            <select name="sortLogic">
                <option disabled selected >по возрастанию/убыванию</option>
                <option value="asc">По возрастанию</option>
                <option value="desc">По убыванию</option>
            </select>
        <button type="submit">Сортировать</button>
        </form>
    </div>
    <div><table class="table" style="margin-top: 2em; width: auto">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Advertising</th>
            <th scope="col">Art</th>
            <th scope="col">Instructor</th>
            <th scope="col">Status</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
                <tr>
                    <td>@php echo $client->name .' '. $client->surname @endphp</td>
                    <td>@php echo $client->phone @endphp</td>
                    <td>@php echo $client->advertising @endphp</td>
                    <td>@php echo $client->instructor->art->title @endphp</td>
                    <td><a href="/instructors/@php echo $client->instructor->id @endphp">@php echo $client->instructor->name . ' ' . $client->instructor->surname @endphp</a></td>
                    <td>@php echo $client->status->title @endphp</td>
                    <td><a href="/clients/@php echo $client->id @endphp">посмотреть клиента</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
        {{$clients->links()}}
    </div>

@endsection

