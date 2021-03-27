@extends('admin.adminmaster')
@section('content')
<div class="container">

      <form method="POST" 
      action="{{url('admin/products/add-product/')}}">
          @csrf
          <div class="field">
        <label class="label">Name</label>
        <div class="control">
          <input class="input" type="text" placeholder="Text input" name ="name">
        </div>
      </div>

        <div class="input-group">
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="profile_pic">
    <label class="custom-file-label custom-file" for="inputGroupFile04">Choose file</label>
  </div>
</div>

      <div class="field">
        <label class="label">Detail</label>
        <div class="control">
          <input class="input" type="text" placeholder="Text input" name ="detail">
        </div>
      </div>

      <div class="field">
        <label class="label">Price</label>
        <div class="control">
          <input class="input" type="number" placeholder="Text input" name ="price">
        </div>
      </div>

      <div class="field">
        <label class="label">Discount</label>
        <div class="control">
          <input class="input" type="number" placeholder="Text input" name ="discount">
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
              <option value="1">Active</option>
              <option value="0">Inactive</option>
            </select>
          </div>
        </div>
      </div>


    <button class="button is-success">Submit</button>
  </form>

</div>

@stop