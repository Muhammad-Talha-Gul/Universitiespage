<style type="text/css">
    .loading {
     position: relative;
    background: #fff;
    opacity: 0.3;
    transition: opacity 1;
}
</style>
<div id="logos-load" style="width: 100%; position: relative;">
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Preview</th>
            <th>Alt</th>
            <th>Added at</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($logos as $value)
        <tr>
            <td><img src="{{asset('uploads/logos/'.$value->image)}}" width="50"></td>
            <td>{{$value->alt}}</td>
            <td>{{date_format($value->created_at,'d-m-Y')}}</td>
            <td>
                <a href="javascript:void(0)" class="btn btn-sm btn-warning edit_logo" data-id="{{$value->id}}"><i class="fa fa-pencil"></i></a>
                <a href="javascript:void(0)" class="btn btn-sm btn-danger delete_logo" data-id="{{$value->id}}"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>