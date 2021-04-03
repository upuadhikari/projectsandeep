@extends('admin.adminmaster')
@section('content')

<div class="container py-4">
  <div class="row">
    <div class="col-md-2 mx-auto">
  <h3 class="text-info border border-info text-center py-3">Add User</h3>
    </div>
  </div>
    <div class="row">
        <div class="col-md-10 mx-auto">
            <form method="POST" action="{{url('admin/users/add-user/')}}" enctype="multipart/form-data">
            @csrf
                <div class="form-group row">
                    <div class="col-sm-6">
                    <input class="input" type="text" placeholder="Username" name ="name" required>
                  </div>
                    <div class="col-sm-6">
                    <input class="input" type="text" placeholder="Full Name" name ="fullname" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                    <input class="input" type="email" placeholder="Email" name="email" required>
                    </div>
                    <div class="col-sm-6">
                    <input class="input" type="text" placeholder="Address" name="address" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <input class="input" type="password" placeholder="Password" name="password" required>
                    </div>
                    <div class="col-sm-6">
                    <input class="input" type="password" placeholder="Confirm Password" name="password_confirmation" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                    <input class="input" type="text" placeholder="Mobile No." name="mobile" required>
                    </div>
                    <div class="col-sm-3">
                    <select name="status" class="form-select">
                    <option selected>Select Status</option>
                      <option value="1">Active</option>
                      <option value="0">Inactive</option>
                    </select>
                    </div>
                    <div class="col-sm-3">
                    <select name="role" class="form-select">
                    <option selected>Select Role</option>
                      <option value="1">Normal user</option>
                      <option value="2">Seller</option>
                      <option value="3">Admin</option>
                    </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-4">
                        <input class="input" type="file" name="picture" required>
                    </div>
                <div class="col-sm-4"></div>
                    <div class="col-sm-4 mx-auto my-auto d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary px-5 py-3">Add User</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop