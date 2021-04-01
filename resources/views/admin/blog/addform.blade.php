@extends('admin.adminmaster')
@section('content')
<div class="container">

      <form method="POST" 
      action="{{url('/admin/blogView/add-blog/')}}" enctype="multipart/form-data">
          @csrf

          <div class="input-group">
  
</div>

<div class="field">
        <label class="label">Upload Pictures</label>
        <div class="control">
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="picture">
          <label class="custom-file-label custom-file" for="inputGroupFile04">Choose file</label>
        </div>
        </div>
      </div>



          <div class="field">
        <label class="label">Title</label>
        <div class="control">
          <input class="input" type="text" placeholder="Text input" name ="title">
        </div>
      </div>

        

      <div class="field">
        <label class="label">Detail</label>
        <div class="control">
          <input class="input" type="text" placeholder="Text input" name ="body">
        </div>
      </div>




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