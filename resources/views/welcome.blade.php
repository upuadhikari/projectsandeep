
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
                    <img src="images/bg1.jpg" class="d-block w-100" alt="dog1">
                </div>
                <div class="carousel-item">
                    <img src="images/bg2.jpg" class="d-block w-100" alt="cat1">
                </div>
                <div class="carousel-item">
                    <img src="images/bg.jpg" class="d-block w-100" alt="dog2">
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
    <hr>
    
    <div class="container">
        <div class="row mx-auto">
            @foreach ($products as $product)
            <div class="col-sm-3">
                <div class="card text-center mb-4" id="card" style="width: 18rem;">
                    <!-- <span class="card-notify-badge">Special</span>
                    <span class="card-notify-total">5</span> -->
                    <img class="img-fluid mx-auto" id="ima" src="{{asset('/images/product/'.$product->picture)}}" alt="">
                    <div class="card-body">
                        <h5 class="card-title" id="breed-name">{{$product->name}}</h5>
                        <p class="card-text">{{$product->detail}}</p>
                        <a href="{{ url('/homeproducts/view-product/'.$product->id) }}" id="more-details" class="btn btn-primary">More Details</a>
                        <a href="{{ url('/products/add-to-cart/'.$product->id) }}" id="more-details" class="btn btn-danger">Add to cart</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{ $products->links("pagination::bootstrap-4") }} 
    </div> 
    <hr>


    @include('footer')
