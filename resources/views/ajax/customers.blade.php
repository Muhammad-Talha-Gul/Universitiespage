<table class="table fetchedCustomers">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $value)
        <tr>
            <td>{{$value->first_name.' '.$value->last_name}}</td>
            <td>{{$value->email}}</td>
            <td>{{$value->phone}}</td>
            <td><a href="javascript:void(0)" class="btn btn-sm btn-primary addCustomer" data-id="{{$value->id}}">Add</a></td>
        </tr>
        @endforeach
    </tbody>
</table>