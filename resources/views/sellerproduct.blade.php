@include('header')
<div class="container">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('errors') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="container" id="bodyContainer">
        <div class="row  my-3">
            <div class="col-md-4 ">
                <h2 id="lis">List of Products</h2>
            </div>
            <div class="col-md-4 my-auto">
                <form class="d-flex "  action="{{url('admin/products/search-product/')}}" method="POST">
                    @csrf
                    <input class="form-control" type="search" placeholder="You looking for?" aria-label="Search" name="searched">
                    <button class="btn btn-outline-success ms-1" type="submit">Search</button>
                </form>
            </div>
            <div class="col-md-4 d-flex justify-content-end">
            <button class="btn btn-primary ms-1" type="submit"><a href="{{url('admin/products/add-product')}}" class="btn text-white" type="submit">Add Product</a></button>
            
            </div>
        </div>
        <table class="table table-hover text-center" id="t-able">
           
                <thead>
                <tr>
               <th>Name</th>
                <th>Picture</th>
                <th>Detail</th>
                <th>Price</th>
                <th>Action</th>

                </tr>
                </thead>

            @foreach($data as $product)
            <tr class="p-5">
            <td>{{$product->name}}</td>
                    <td><img src="{{asset('/images/product/'.$product->picture)}}" width="50" height="40"></td>
                    <td class="text-justify w-50">{{$product->detail}}</td>
                    <td>{{$product->price}}</td>
                    <td>
                        <form method="post" action="{{url('admin/products/delete-product/'.$product->id)}}"  >
                            <a href="{{url('admin/products/edit-product/'.$product->id)}}" class="btn btn-success me-1">Edit </a>
                            @csrf
                            <button class="btn btn-danger" >Delete </button>
                        </form>

                    </td>
            </tr>
            @endforeach
        </table>
        {{ $data->links("pagination::bootstrap-4") }}
    </div>
@include('footer')