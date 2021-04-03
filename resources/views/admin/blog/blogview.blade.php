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


        <div class="container" id="bodyContainer">
        <div class="row  my-3">
            <div class="col-md-4 ">
                <h2 id="lis">List of Blogs</h2>
            </div>
            <div class="col-md-4 my-auto">
                <form class="d-flex "  action="{{url('admin/blogView/search-blog/')}}" method="POST">
                    @csrf
                    <input class="form-control" type="search" placeholder="You looking for?" aria-label="Search" name="searched">
                    <button class="btn btn-outline-success ms-1" type="submit">Search</button>
                </form>
            </div>
            <div class="col-md-4 d-flex justify-content-end">
            <button class="btn btn-primary ms-1" type="submit"><a href="{{url('/admin/blogView/add-blog')}}" class="btn text-white" type="submit">Add Product</a></button>
            
            </div>
        </div>
        <table class="table table-hover text-center" id="t-able">
           
                <thead>
                <tr>
                <th>Picture</th>
                 <th>Title</th>
                 <th>Detail</th>
                 <th>Action</th>
                </tr>
                </thead>

            @foreach($data as $blog)
            <tr class="p-5">
            <td><img src="{{asset('/images/'.$blog->picture)}}" width="50px" height="40"></td>
                    <td>{{$blog->title}}</td>
                    <td class="w-50">{{$blog->body}}</td>
                    <td>
                        <form method="post" action="{{url('/admin/blogView/delete-blog/'.$blog->id)}}">
                            <a href="{{url('/admin/blogView/edit-blog/'.$blog->id)}}" class="btn btn-success me-1">Edit </a>
                            @csrf
                            <button class="btn btn-danger" >Delete </button>
                        </form>

                    </td>
            </tr>
            @endforeach
        </table>
        {{ $data->links("pagination::bootstrap-4") }}
    </div>
    @stop