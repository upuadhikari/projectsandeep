
<table border="1px solid #000">
<tr>
<th>NAME</th>
<th>Detail</th>
<th>Price</th>
</tr>

@foreach ($data as $product)
<tr>
<th>{{$product->name}}</th>
<th>{{$product->detail}}</th>
<th>{{$product->price}}</th>
</tr>
@endforeach

</table>