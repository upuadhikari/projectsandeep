@extends('seller.sellermaster')
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
            <a href="{{url('/admin/blogView/add-blog')}}" class="button is-primary">Add Product</a>
        </div>
         <h2 style="color:blue">Search result </h2>

         <table border="1px" class="table">
             <tr>
                
                <th>Title</th> 
                <th>Picture</th>
                <th>Detail</th>
                 

             </tr>

             @foreach($data as $blog)
                <tr>
                    <td>{{$blog->title}}</td>
                    <td><img src="{{asset('/images/'.$blog->picture)}}" width="50" height="40"></td>
                    <td>{{$blog->body}}</td>
                    <td>
                        
                        <form method="post" action="{{url('/admin/blogView/delete-blog/'.$blog->id)}}"  >
                            <a href="{{url('admin/blogView/edit-product/'.$blog->id)}}" class="btn btn-primary">Edit </a>
                            @csrf
                            <button class="btn btn-danger" >Delete </button>
                        </form>

                    </td>
                    <!-- <td><a href="{{url('admin/user/delete-product/'.$blog->id)}}" class="btn btn-default">
                        Delete
                    </a></td> -->
                </tr>
             @endforeach


         </table>
        <!--  <p>Red background </p> -->
</div>
 @stop