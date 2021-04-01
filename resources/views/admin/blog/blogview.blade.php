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

        <form style="float: right; margin-left: 5px;" method="POST" 
          action="{{url('admin/blogView/search-blog/')}}" >
              @csrf
                  <input class="input is-normal" type="text" placeholder="Search..." style="width: 300px; " name="searched">
                  <button class="button is-primary" >Search</button>

        </form>

        <div class="buttons" style="float: right;">
            <a href="{{url('/admin/blogView/add-blog')}}" class="button is-primary">Add Blog</a>
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
                        
                        <form method="post" action="{{url('/admin/blogView/delete-blog/'.$blog->id)}}"  >
                            <a href="{{url('/admin/blogView/edit-blog/'.$blog->id)}}" class="btn btn-primary">Edit </a>
                            @csrf
                            <button class="btn btn-danger" >Delete </button>
                        </form>

                    </td>
                    <!-- <td><a href="{{url('admin/user/delete-user/'.$blog->id)}}" class="btn btn-default">
                        Delete
                    </a></td> -->
                </tr>
             @endforeach


         </table>
        <!--  <p>Red background </p> -->
        {{ $data->links("pagination::bootstrap-4") }}
</div>
 @stop