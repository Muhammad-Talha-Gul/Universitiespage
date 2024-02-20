<table class="table hover">
    <thead>
    <tr>
        <th>Title</th>
        <th>Created at</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
	    @foreach($news as $new)
	    <tr>
	        <td>{{$new->title}}</td>
	        <td>{{$new->created_at}}</td>
	        <td>
	            <a href="javascript:void(0);" data-toggle="modal" data-target="#editNews" data-id="{{$new->id}}" class="btn btn-warning btn-xs edit_news"><i class="fa fa-pencil"></i></a>
	            <a class="btn btn-danger btn-xs " onclick="deleteNews('{{$new->id}}');"><i class="fa fa-trash"></i></a>

	        </td>
	    </tr>
	    @endforeach
    </tbody>
</table>