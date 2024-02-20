<table class="table fetchedSuppliers">
    <thead>
        <tr>
            <th>Supplier</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Country</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $value)
        <tr>
            <td>{{$value->supplier}}</td>
            <td>{{$value->first_name.' '.$value->last_name}}</td>
            <td>{{$value->email}}</td>
            <td>{{$value->phone}}</td>
            <td>{{$value->country}}</td>
            <td><a href="javascript:void(0)" class="btn btn-sm btn-primary addSupplier" data-id="{{$value->id}}">Add</a></td>
        </tr>
        @endforeach
    </tbody>
</table>