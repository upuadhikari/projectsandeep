@extends('seller.sellermaster')
@section('content')

<div class="container py-5">
  <div class="row">
    <div class="col-md-2 mx-auto">
  <h3 class="text-success border border-success text-center py-3">Add Product</h3>
    </div>
  </div>
    <div class="row">
        <div class="col-md-10 mx-auto">
            <form method="POST" action="{{url('seller/products/add-product/')}}" enctype="multipart/form-data">
            @csrf
                <div class="form-group row">
                    <div class="col-sm-6">
                    <input class="input" type="text" placeholder="Product Name" name ="name" required>
                  </div>
                    <div class="col-sm-6">
                    <input class="input" type="file" name="picture" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                    <input class="input" type="text" placeholder="Product Detail" name="detail" required>
                    </div>
                    <div class="col-sm-6">
                    <input class="input" type="text" placeholder="Price" name="price" id="price" required onkeyup="fun()">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <input class="input" type="text"  id="contactform-member" placeholder="Discount" name="discount" onkeyup="fun()" required>
                    </div>
                    <div class="col-sm-6">
                    <span id="result"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3">
                    <select name="status" class="form-select">
                    <option selected>Select Status</option>
                      <option value="1">Active</option>
                      <option value="0">Inactive</option>
                    </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-4"></div>
                <div class="col-sm-4"></div>
                    <div class="col-sm-4 mx-auto my-auto d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary px-5 py-3">Add Product</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
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