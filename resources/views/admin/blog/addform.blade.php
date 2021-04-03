@extends('admin.adminmaster')
@section('content')
<div class="container py-5">
  <div class="row">
    <div class="col-md-2 mx-auto">
  <h3 class="text-secondary border border-secondary text-center py-3">Add Blog</h3>
    </div>
  </div>
    <div class="row">
        <div class="col-md-10 mx-auto">
            <form method="POST" action="{{url('/admin/blogView/add-blog/')}}" enctype="multipart/form-data">
            @csrf
                <div class="form-group row">
                    <div class="col-sm-6">
                    <input class="input" type="text" placeholder="title" name ="title">
                  </div>
                    <div class="col-sm-6">
                    <input class="input" type="file" name="picture" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                    <input class="input" type="text" placeholder="Blog Body" name ="body">
                    </div>
                    <div class="col-sm-4">
                    <select name="status" class="form-select">
                    <option selected>Select Status</option>
                      <option value="1">Active</option>
                      <option value="0">Inactive</option>
                    </select>
                    </div>                    
                </div>
                <div class="form-group row">
                    <div class="col-sm-8"></div>
                    <div class="col-sm-4 mx-auto my-auto d-flex justify-content-end">
                      <button type="submit" class="btn btn-primary px-5 py-3">Add Blog</button>
                    </div>                   
                </div>
            </form>
        </div>
    </div>
</div>
@stop