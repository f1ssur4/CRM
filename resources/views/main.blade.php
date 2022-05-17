@extends('layouts.main')
@section('title', 'main')

@section('content')
    <h1 style="margin: 10px">Welcom to CRM</h1>


    @if(\Illuminate\Support\Facades\Gate::check('view'))
        <div style="margin: 10px">
            <label style="margin-top: 10px">Choose your identification color</label>
            <form action={{ route('admin.data') }} method="POST">
                @csrf
                <p><select size="3" multiple name="color" required>
                        <option value="red">Red</option>
                        <option value="black">Black</option>
                        <option value="green">Green</option>
                        <option value="blue">Blue</option>
                    </select></p>
                <p>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Choose</button>
                </div>
            </form>
        </div>
    @endif

    @error('authorize')
    <div class="alert alert-warning">{{ $message }}</div>
    @enderror

@endsection
