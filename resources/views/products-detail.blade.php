@include('header')


<div class="container container-row" id="product">
        <div class="product-image">
            <img src="images/siberian.png" alt="" class="product-pic">
        </div>

        <div class="product-details">
            <header>
                <div class="foot-er justify-content-end">
                    
                    @auth
                    <button type="button">
                    <span><a class="text-white px-3" href="/blog">Blog</a></span>
                  </button>
                    @else
                    <!-- <span><a class="text-white px-3" href="blog.html"></a></span> -->
                    @endauth
                </div>
                <h1 class="title">{{$product->name}}</h1>
                <div class="price">
                    <span class="current">{{$product->price}}</span>
                </div>
            </header>
            <article>
                <h5>Description</h5>
                <p>{{$product->name}}</p>
            </article>
        </div>
    </div>



@include('footer')