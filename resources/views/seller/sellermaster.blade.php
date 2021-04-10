<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Online Kennel Shop</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- extra css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">



    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navaddform.css') }}">







    <!-- fonts -->
    <link rel="stylesheet" href="{{ asset('fonts/material-icon/css/material-design-iconic-font.min.css') }}">


</head>

<body class="antialiased">
    @csrf


    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/seller">
            <h2 class="text-white">Seller Panel</h2>
                <!-- <img class="img-fluid sitelogo" src="{{asset('images/logo.png')}}" alt="" width="200" height="60"> -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-nav" id="navbarNavAltMarkup">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white px-3" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Products
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li class="text-center"><a class="dropdown-item" href="/seller/products">View Products</a></li>
                        <li class="text-center"><a class="dropdown-item" href="{{url('seller/products/add-product')}}">Add Product</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white px-3" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Blogs
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li class="text-center"><a class="dropdown-item" href="/seller/blogView">View Blogs</a></li>
                        <li class="text-center"><a class="dropdown-item" href="{{url('/seller/blogView/add-blog')}}">Add Blog</a></li>
                        </ul>
                    </li>
                </div>


            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active text-white px-3" aria-current="page" href="{{ url('/') }}">Home</a>
                    <a class="nav-link text-white px-3" href="/blog">Blog</a> 
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white px-3" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li class="text-center"><a class="dropdown-item" href="{{ url('/profile') }}">Profile</a></li>
                        <li>
                                <form class="d-grid" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <input type="submit" class="btn btn-light" id="btn-of-blog" value="logout">
                                </form>
                            </li>

                        </ul>
                    </li>
                </div>
            </div>
        </div>
    </nav>
    @yield ('content')

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"></script>
</body>

</html>