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
            <a href="{{url('seller/blog/add-blog')}}" class="button is-primary">Add Blog</a>
        </div>
         <h2 style="color:blue">List of blogs</h2>

         <table border="1px" class="table">
             <tr>
                 <th>Picture</th>
                 <th>Title</th>
                 <th>Detail</th>
                 <th>Action</th>

             </tr>

             @foreach($data as $blog)
                <tr>
                    <td><img src="{{asset('/images/'.$blog->picture)}}" width="50px" height="40"></td>
                    <td>{{$blog->title}}</td>
                    <td>{{$blog->body}}</td>
                    <td>
                        
                        <form method="post" action="{{url('seller/blog/delete-blog/'.$blog->id)}}"  >
                            <a href="{{url('seller/blog/edit-blog/'.$blog->id)}}" class="btn btn-primary">Edit </a>
                            @csrf
                            <button class="btn btn-danger" >Delete </button>
                        </form>

                    </td>
                    <!-- <td><a href="{{url('seller/user/delete-user/'.$blog->id)}}" class="btn btn-default">
                        Delete
                    </a></td> -->
                </tr>
             @endforeach


         </table>
        <!--  <p>Red background </p> -->
</div>
 @stop