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
                <h2 id="lis">List of Users</h2>
            </div>
            <div class="col-md-4 my-auto">
                <form class="d-flex "  action="{{url('admin/users/search-user/')}}" method="POST">
                    @csrf
                    <input class="form-control" type="search" placeholder="You looking for?" aria-label="Search" name="searched">
                    <button class="btn btn-outline-success ms-1" type="submit">Search</button>
                </form>
            </div>
            <div class="col-md-4 d-flex justify-content-end">
            <button class="btn btn-primary ms-1" type="submit"><a href="{{url('admin/users/add-user')}}" class="btn text-white" type="submit">Add User</a></button>
            
            </div>
        </div>
        <table class="table table-hover text-center" id="t-able">
           
                <thead>
                <tr>
                <th>Profile Picture</th>
                 <th>Name</th>
                 <th>Full Name</th>
                 <th>Email</th>
                 <th>Address</th>
                 <th>Mobile</th>
                 <th>Role</th>
                 <th>Action</th>
                </tr>
                </thead>

            @foreach($data as $user)
            <tr class="p-5">
                <td><img src="{{asset('/images/users/'.$user->picture)}}" width="50px" height="40"></td>
                <td>{{$user->name}}</td>
                    <td>{{$user->fullname}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->address}}</td>
                    <td>{{$user->mobile}}</td>
                    <td>{{$user->role}}</td>
                    <td>   
                        <form method="post" action="{{url('admin/users/delete-user/'.$user->id)}}"  >
                            <a href="{{url('admin/users/edit-user/'.$user->id)}}" class="btn btn-success me-1">Edit </a>
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