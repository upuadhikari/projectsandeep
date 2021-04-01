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


    <div class="container" id="contain">
        <div id="fh5co-portfolio">
        @foreach ($blogs as $blog)
            <div class="fh5co-portfolio-item ">
                <div class="fh5co-portfolio-figure animate-box">
                <img src="{{asset('/images/'.$blog->picture)}}" width="700px">
                </div>
                <div class="fh5co-portfolio-description">
                    <h1>{{$blog->title}}</h1>
                    <p>{{$blog->body}}</p>
                    <p><a href="{{ url('/view-blog/'.$blog->id) }}" class="btn btn-primary">Learn More</a></p>
                </div>
            </div>
        @endforeach


            <!-- <div class="fh5co-portfolio-item fh5co-img-right">
                <div class="fh5co-portfolio-figure animate-box" style="background-image: url(images/pic_2.jpg);"></div>
                <div class="fh5co-portfolio-description">
                    <h1>Project Title</h1>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named
                        Duden flows by their place and supplies it with the necessary regelialia.</p>
                    <p><a href="#" class="btn btn-primary">Learn More</a></p>
                </div>
            </div>
            <div class="fh5co-portfolio-item ">
                <div class="fh5co-portfolio-figure animate-box" style="background-image: url(images/pic_3.jpg);"></div>
                <div class="fh5co-portfolio-description">
                    <h1>Project Title</h1>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named
                        Duden flows by their place and supplies it with the necessary regelialia.</p>
                    <p><a href="#" class="btn btn-primary">Learn More</a></p>
                </div>
            </div>
            <div class="fh5co-portfolio-item fh5co-img-right">
                <div class="fh5co-portfolio-figure animate-box" style="background-image: url(images/pic_4.jpg);"></div>
                <div class="fh5co-portfolio-description">
                    <h1>Project Title</h1>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named
                        Duden flows by their place and supplies it with the necessary regelialia.</p>
                    <p><a href="#" class="btn btn-primary">Learn More</a></p>
                </div>
            </div> -->
        </div>
    </div>

    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
@include('footer')