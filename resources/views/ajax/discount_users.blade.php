<div class="form-group pull-right" style="margin-bottom: 10px;">
    <form action="#" method="POST" id="customers_form" form="customers_form">{{csrf_field()}}</form>
    @if(isset($discount['id'])) <input type="hidden" name="discount_id" form="customers_form" value="{{$discount['id']}}"> @endif
    <input type="hidden" name="div" form="customers_form" value="{{$div}}">
    <input type="hidden" name="name" form="customers_form" value="{{$name}}">
    <a class="btn btn-primary btn-sm" id="addCustomers">Add (<span id="usersCount">0</span>)</a>
</div>
<div class="clearfix"></div>
<table class="table fetchedCustomers">
    <thead>
        <tr>
            <th><input type="checkbox" id="check_users"></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $value)
        <tr>
            <td><input type="checkbox" class="usersItem" name="ids[]" form="customers_form" value="{{$value->id}}" {{(in_array($value->id, $already))?'disabled':''}}></td>
            <td>{{$value->first_name.' '.$value->first_name}}</td>
            <td>{{$value->email}}</td>
        </tr>
        @endforeach
    </tbody>
</table>