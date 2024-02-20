<form action="{{route("updateFOrder",$data['id'])}}" method="POST">
    {{csrf_field()}}
    <div class="form-group">
        <input type="text" class="form-control" name="customer" placeholder="Customer Name" required value="{{$data['customer']}}">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="city" placeholder="City" value="{{$data['city']}}" required>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="country" placeholder="Country" value="{{$data['country']}}" required>
    </div>
    <div class="form-group">
        <select class="form-control select2" name="product_id" required>
            <option value="">Select Product</option>
            @foreach($products as $value)
            <option value="{{$value->id}}" {{($data['product_id']==$value->id)?'selected':''}}>{{$value->title}}</option>
            @endforeach
        </select>
    </div>            
    <div class="form-group text-center">
        <input type="submit" class="btn btn-md btn-success" style="width: 100%;" value="Update">
    </div>
</form>
      