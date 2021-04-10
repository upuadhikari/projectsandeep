@include('header')
<div class="container" id="carousel">
        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/care_1.jpg" class="d-block w-100" alt="..">
                    <div class="carousel-caption d-flex h-100 align-items-center justify-content-center">
                        <h1><b>WELCOME TO BLOG</b></h1>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/care_2.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-flex h-100 align-items-center justify-content-center">
                        <h1><b>LEARN MORE ABOUT<br> YOUR PETS HERE</b></h1>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/care_3.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-flex h-100 align-items-center justify-content-center">
                        <h1><b>WITH MORE DETAILS MORE<br>KNOWLEDGE ON RAISING PETS</b></h1>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
        </div>
    </div>

        <div class="container mt-4">
            <div class="row">
            @foreach ($blogs as $blog)
                <div class="col-4">
                    <div class="card">
                        <img src="{{asset('/images/'.$blog->picture)}}" class="card-img-top" id="imgu">
                            <div class="card-body">
                                <h5 class="card-title">{{$blog->title}}</h5>
                                <p class="card-text">{{$blog->body}}</p>
                                <p><a href="{{ url('/view-blog/'.$blog->id) }}" class="btn btn-primary">Learn More</a></p>
                            </div>
                    </div>
                </div>
            @endforeach
            </div>
        {{ $blogs->links("pagination::bootstrap-4") }}
        </div>





@include('footer')