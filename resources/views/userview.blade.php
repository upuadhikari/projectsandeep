<table border="1px solid #000">
<tr>
<th>NAME</th>
<th>Email</th>
<th>Action</th>
</tr>

@foreach ($data as $user)
<tr>
<td>{{$user->name}}</td>
<td>{{$user->email}}</td>
<td><a href="{{url('admin/user/edit-user/'.$user->id)}}">Edit</a></td>
<!-- <td><a href="{{url('admin/user/delete-user/'.$user->id)}}" class="btn btn-default">Delete</a></td> -->
</tr>
@endforeach

</table>




<!-- <table border="1px solid #000">
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

</table> -->
