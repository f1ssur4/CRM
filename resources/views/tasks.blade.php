@extends('layouts.main')
@section('title', 'Admin tasks')

@section('content')
    @php $i = 1;@endphp

    <p><h1 style="margin-left: 10px">Table of daily tasks</h1>

    <table class="table" style="margin-top: 2em">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Task</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
            <tr>
                <th scope="row">@php echo $i @endphp</th>
                <td>@php echo $task->content @endphp</td>
                <td>
                    <div class="rectangle"
                         style="margin-top: 8px;position: fixed;width: 20px;height: 20px;-moz-border-radius: 10px;-webkit-border-radius: 10px;border-radius: 10px;background:@php echo session()->get('color') @endphp;"></div>
                </td>
                <td>
                    <button class="btn btn-primary">In process</button>
                </td>
                <td>
                    <div class="rectangle"
                         style="margin-top: 8px;position: fixed;width: 20px;height: 20px;-moz-border-radius: 10px;-webkit-border-radius: 10px;border-radius: 10px;background:@php echo session()->get('color') @endphp;"></div>
                </td>
                <td>
                    <button class="btn btn-success">Ready</button>
                </td>
            </tr>
            @php $i += 1 @endphp
        @endforeach
        </tbody>
    </table>
@endsection

