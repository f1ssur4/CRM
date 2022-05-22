<html>
<head>
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
            integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
            integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
            crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
@section('topbar')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">CRM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    @if(\Illuminate\Support\Facades\Gate::check('admin1') || \Illuminate\Support\Facades\Gate::check('admin2'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('tasks.list') }}">Tasks</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/teachers">Teachers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/clients">Clients</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/statistics">Statistic</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users.create') }}">Create user</a>
                        </li>

                    @endif
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="/lessons">Lessons</a>
                        </li>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="position: absolute; right: 10px">
                            <li class="nav-item">
                                <h5 class="nav-link"
                                    style="color: @php echo session()->get('color') @endphp">@php echo \Illuminate\Support\Facades\Auth::user()->login @endphp</h5>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('users.logout')}}">Logout</a>
                            </li>
                        </ul>
                    @else
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="position: absolute; right: 10px">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('users.login')}}">Login</a>
                            </li>
                        </ul>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
@show
<div class="content" style="margin-top: 20px; margin-bottom: 100px">
    @yield('content')
</div>
@section('bottom')

<div id="copyright" class="botbar" style="position: fixed; bottom: 0; left: 0; width: 100%">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <p style="margin-left: 42%">&copy; Untitled. All rights reserved</p>
            </div>
        </div>
    </nav>
    </center>
</div>
</body>
@show
</html>
