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

  <form method="POST" 
action="{{url('/admin/blogView/edit-blog/'.$blog->id)}}">
          @csrf
          <div class="field">
        <label class="label">Name</label>
        <div class="control">
          <input class="input" type="text" placeholder="Text input" name ="name" value="{{$blog->name}}">
        </div>
      </div>

      <div class="field">
        <label class="label">Details</label>
        <div class="control">
          <input class="input" type="text" placeholder="Text input" name ="detail" value="{{$blog->detail}}">
        </div>
      </div>

       <div class="field">
        <label class="label">Price</label>
        <div class="control">
          <input class="input" type="text" placeholder="Price input" name="price" value="{{$blog->price}}">
        </div>
      </div>

      <div class="field">
        <label class="label">Discount</label>
        <div class="control">
          <input class="input" type="number" placeholder="discount input" name="discount" value="{{$blog->discount}}">
        </div>
      </div>

<!--   <div class="input-group">
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="profile_pic">
    <label class="custom-file-label custom-file" for="inputGroupFile04">Choose file</label>
  </div>
</div> -->

      <div class="field">
        <label class="label">Status:</label>
        <div class="control">
          <div class="select">
            <select name="status">
              @if ($blog->status==1)
              <option value="1" selected >
                  Active
              </option>
              <option value="0">Inactive</option>
              @else
               <option value="0" selected >
                  Inactive
              </option>
              <option value="1">Active</option>
              @endif
            </select>
          </div>
        </div>
      </div>
      <button class="button is-success">Submit</button>
        </div>
      </div>
  </form>

</div>

@stop