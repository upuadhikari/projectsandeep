<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{asset('css/fonts/material-icon/css/material-design-iconic-font.min.css')}}">
    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('css/loginregister.css')}}">

    <style></style>
</head>

<body>

@if (Route::has('login'))
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container">
                    <a class="navbar-brand" href="home.html">
                        <img class="img-fluid sitelogo" src="images/logo.png" alt="" width="200" height="60">
                    </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                <a class="nav-link active text-white px-3" aria-current="page" href="/">Home</a>
                    @auth
                <a class="nav-link text-white px-3" href="{{ url('/dashboard') }}">{{ __('Dashboard') }}</a>
                <a class="nav-link text-white px-3" href="{{ url('/profile') }}">{{ Auth::user()->name }} profile</a>
                <a class="nav-link text-white px-3" href="{{ route('logout') }}">{{ __('Log out') }}</a>
                    @else
                <a class="nav-link text-white px-3" href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                 <a class="nav-link text-white px-3" href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
                    <!-- <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a> -->
                </div>
            </div>
        </div>
    </nav>
    @endif

    <div class="alert alert-success text-center" id="mydiv">
        Welcome " {{ Auth::user()->name }} ",
        You're logged in!
    </div>
<script>
    setTimeout(function() {
    $('#mydiv').fadeOut('fast');
    }, 2000); // <-- time in milliseconds

</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"></script>
