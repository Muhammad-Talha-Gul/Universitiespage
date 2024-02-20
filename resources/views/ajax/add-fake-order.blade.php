<form action="{{route("storeFOrder")}}" method="POST">
    {{csrf_field()}}
    <div class="form-group">
        <input type="text" class="form-control" name="customer" placeholder="Customer Name" required>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="city" placeholder="City" required>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="country" placeholder="Country" required>
    </div>
    <div class="form-group">
        <select class="form-control select2" name="product_id" required>
            <option value="">Select Product</option>
            @foreach($products as $value)
            <option value="{{$value->id}}">{{$value->title}}</option>
            @endforeach
        </select>
    </div>            
    <div class="form-group text-center">
        <input type="submit" class="btn btn-md btn-success" style="width: 100%;" value="Add">
    </div>
</form>
      