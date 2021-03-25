<h4>List of Users</h4>
            <div class="col-sm-6 text-right">
<a href="{{url('user/add-uer')}}" class="btn btn-info">Add New User</a>
            </div>
    
  <!-- <table class="table data-table table-striped table-hover">
    <thead>
    <tr>
        <th>SN</th>
        <th>Name</th>
        <th>Email</th>
        <th class="text-right">Action</th>
    </tr>
</thead>
    <tbody>
    <?php $count = 1; ?>
    @foreach($data as $user)
    <tr>
            <td>{{$count}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->status==1 ? 'Active': 'In-active'}}</td>
            <td class="actions text-right">
                <a href="{{url('user/edit-user/'.$city->id)}}" class="btn btn-info">Edit</i></a>
                <a href="#" data-url="{{url('user/delete-user/'.$city->id)}}"
                   >Delete</i></a>
            </td>
    </tr>
    <?php $count++; ?>
    @endforeach
    </tbody>
</table> -->
