@extends('layouts.main')
@section('title', 'Arts')

@section('content')
    <a class="btn btn-primary" style="margin-left: 20px" href="{{route('arts.index')}}">Back to list</a>
    <div>
        <table class="table" style="margin-top: 2em; width: 1000px; margin-left: 250px; size: 1000px">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col">Title</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col">School</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td> @php echo $art->id @endphp</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td> @php echo $art->title @endphp</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td> @php echo $art->school->address @endphp</td>
                </tr>
            </tbody>
        </table>
        <h5 style="margin-left: 250px; margin-top: 2em">The teachers of this art</h5>
        <table class="table" style="margin-top: 2em; width: auto; margin-left: 250px; size: 1000px">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($instructors as $instructor)
                <tr>
                <td> @php echo $instructor->name . ' ' . $instructor->surname @endphp</td>
                <td><a href="/instructors/@php echo $instructor->id @endphp">show more</a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
