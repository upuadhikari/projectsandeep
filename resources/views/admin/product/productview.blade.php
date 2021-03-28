@extends('admin.adminmaster')
@section('content')
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

        <div class="buttons" style="float: right;">
            <a href="{{url('admin/products/add-product')}}" class="button is-primary">Add Product</a>
        </div>
         <h2 style="color:blue">List of Products</h2>

         <table border="1px" class="table">
             <tr>
                <th>Name</th>
                <th>Picture</th>
                <th>Detail</th>
                <th>Price</th>
                <th>Action</th>

             </tr>

             @foreach($data as $product)
                <tr>
                    <td>{{$product->name}}</td>
                    <td><img src="{{asset('/images/product/'.$product->picture)}}" width="50" height="40"></td>
                    <td>{{$product->detail}}</td>
                    <td>{{$product->price}}</td>
                    <td>
                        
                        <form method="post" action="{{url('admin/products/delete-product/'.$product->id)}}"  >
                            <a href="{{url('admin/products/edit-product/'.$product->id)}}" class="btn btn-primary">Edit </a>
                            @csrf
                            <button class="btn btn-danger" >Delete </button>
                        </form>

                    </td>
                    <!-- <td><a href="{{url('admin/user/delete-user/'.$product->id)}}" class="btn btn-default">
                        Delete
                    </a></td> -->
                </tr>
             @endforeach


         </table>
        <!--  <p>Red background </p> -->
</div>
 @stop