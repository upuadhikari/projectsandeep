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
          action="{{url('admin/users/search-user/')}}" >
              @csrf
                  <input class="input is-normal" type="text" placeholder="Search..." style="width: 300px; " name="searched">
                  <button class="btn btn-primary" >Search</button>

        </form>

        <div class="buttons" style="float: right;">
            <a href="{{url('admin/users/add-user')}}" class="button is-primary">Add User</a>
        </div>
         <h2 style="color:blue">List of users</h2>

         <table border="1px" class="table">
             <tr>
             <th>Profile Picture</th>
                 <th>Name</th>
                 <th>Full Name</th>
                 <th>Email</th>
                 <th>Address</th>
                 <th>Mobile</th>
                 <th>Action</th>

             </tr>

             @foreach($data as $user)
                <tr>
                <td>
        <img src="{{asset('/images/users/'.$user->picture)}}" width="50px" height="40">

                    
                </td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->fullname}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->address}}</td>
                    <td>{{$user->mobile}}</td>
                    <td>
                        
                        <form method="post" action="{{url('admin/users/delete-user/'.$user->id)}}"  >
                            <a href="{{url('admin/users/edit-user/'.$user->id)}}" class="btn btn-primary">Edit </a>
                            @csrf
                            <button class="btn btn-danger" >Delete </button>
                        </form>

                    </td>
                    <!-- <td><a href="{{url('admin/user/delete-user/'.$user->id)}}" class="btn btn-default">
                        Delete
                    </a></td> -->
                </tr>
             @endforeach


         </table>
        <!--  <p>Red background </p> -->
        {{ $data->links("pagination::bootstrap-4") }} 
</div>
 @stop