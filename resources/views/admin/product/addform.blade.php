@extends('admin.adminmaster')
@section('content')
<div class="container">

      <form method="POST" 
      action="{{url('admin/products/add-product/')}}" enctype="multipart/form-data">
          @csrf
          <div class="field">
        <label class="label">Name</label>
        <div class="control">
          <input class="input" type="text" placeholder="Text input" name ="name">
        </div>
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
        <label class="label">Detail</label>
        <div class="control">
          <input class="input" type="text" placeholder="Text input" name ="detail">
        </div>
      </div>

      <div class="field">
        <label class="label">Price</label>
        <div class="control">
          <input id="price" class="input" type="text" placeholder="Text input" name ="price" onkeyup="fun()">
        </div>
      </div>

      <div class="field">
        <label class="label">Discount</label>
        <div class="control">
        <input class="contactform-input input" type="text" id="contactform-member" placeholder="Member" name="member" value="" onkeyup="fun()" /> 
        </div>
      </div>

      <label class="contactform-label" for="contactform-member">
        
        <span id="result"></span>






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
<script>

function fun(){
var price = document.getElementById("price").value;
var member = document.getElementById("contactform-member").value;
var calculate = price - (price * member / 100);
document.getElementById("result").innerHTML = "Total discount= Rs. "+ calculate;
  }

</script>


@stop