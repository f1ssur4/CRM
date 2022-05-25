@extends('layouts.main')
@section('title', 'main')

@section('content')
    <p>
        <button class="btn btn-primary collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
            Toggle width collapse
        </button>
    </p>
    <div style="min-height: 120px;">
        <div class="collapse-horizontal collapse" id="collapseWidthExample" style="">
            <div class="card card-body" style="width: 300px;">
                This is some placeholder content for a horizontal collapse. It's hidden by default and shown when triggered.
            </div>
        </div>
    </div>
@endsection
