@extends('layouts.main')
@section('title', 'Clients')

@section('content')
    <a class="btn btn-primary" style="margin-left: 20px" href="{{route('clients.index')}}">Вернуться к списку</a>
    <div>
        <table class="table" style="margin-top: 2em; width: 900px; margin-left: 250px; size: 1000px">
            <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Name</th>
                <th scope="col">Surname</th>
                <th scope="col">Phone</th>
                <th scope="col">Advertising</th>
                <th scope="col">Status</th>
            </tr>
            </thead>
            <tbody>
            <form action="{{route('clients.update')}}" method="POST">
                @csrf
                <tr>
                    <td><input hidden name="id" value="@php echo $client->id @endphp"></td>
                    <td> @php echo $client->name @endphp</td>
                    <td> @php echo $client->surname @endphp</td>
                    <td><input name="phone" value="@php echo $client->phone @endphp"></td>
                    <td>@php echo $client->advertising @endphp</td>
                    <td><select style="margin-top: 5px" name="status_id">
                            <option
                                value="@php echo $client->status->id @endphp">@php echo $client->status->title @endphp</option>
                            @foreach($statuses as $status)
                                <option value=@php echo $status->id @endphp>@php echo $status->title @endphp</option>
                            @endforeach
                        </select></td>
                    <td>
                        <button class="btn btn-primary" type="submit">Обновить</button>
                    </td>
                </tr>
            </tbody>
        </table>
        @error('id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('phone')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('status_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('comment')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3" style="width: 1000px; margin-left: 200px">
            <label for="exampleFormControlTextarea1" class="form-label"><b>Comment</b></label>
            <textarea class="form-control" name="comment" rows="4">@php echo $client->comment @endphp</textarea>
            </form>
            <div style="margin-top: 50px">
                @error('update_client_success')
                <div class="alert alert-success">{{ $message }}</div>
                @enderror
                @error('update_client_error')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @error('add_subscription_success')
                <div class="alert alert-success">{{ $message }}</div>
                @enderror

                <h2>История абонементов</h2>
                <form action="{{route('clients.add-subs')}}" method="POST">
                    @csrf
                    <div style="margin-left: 700px">
                        <h4>Добавить абонемент</h4>
                        <input hidden name="id" value="@php echo $client->id @endphp">
                        <select required style="margin-top: 5px" name="subscription">
                            <option selected disabled>subscription</option>
                            @foreach($subscriptions as $subscription)
                                <option
                                    value="@php echo $subscription->id @endphp">@php echo $subscription->title . ', минут:' . $subscription->minutes . ', кол-во уроков:' . $subscription->count_lessons . ', цена:' . $subscription->price @endphp</option>
                            @endforeach
                        </select>
                        <button class="btn btn-primary" type="submit">Добавить</button>
                    </div>
                </form>
                <table class="table">
                    <tbody>
                    @foreach($client->subscriptions as $sub)
                        <tr>
                            <td> @php echo $sub->title . ', ' .' минут: ' . $sub->minutes . ', ' .'кол-во уроков: ' . $sub->count_lessons .', цена: ' . $sub->price  @endphp</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </form>
    </div>
@endsection
