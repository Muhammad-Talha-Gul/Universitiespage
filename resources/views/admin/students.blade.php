@extends('layouts.backend')
@section('customStyles')
<link href="{{asset('/plugins/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('/plugins/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('/plugins/datatables/buttons.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('/plugins/datatables/dataTables.colVis.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="page-title-box">
                <h4 class="page-title">Students Resporting</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Admin</a>
                    </li>
                    <li class="active">
                        Students
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card-box table-responsive">
                <h4 class="m-t-0 header-title"><b>Students Resporting List</b></h4>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <select class="form-control filter-course selectable">
                                <option value="">Select Course</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select class="form-control filter-workshop selectable">
                                <option value="">Select Workshop</option>
                            </select>
                        </div>
                    </div>
                    {{-- <div class="col-md-4">
                        <div class="form-group">
                            <select class="form-control filter-learner selectable">
                                <option value="">Select Learner</option>
                            </select>
                        </div>
                    </div> --}}
                </div>
                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th id="filter-learner">Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th id="filter-course">Course</th>
                        <th id="filter-workshop">Workshop</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $value)
                        <tr>
                            <td>{{getUser($value['user_id'])['first_name'].' '.getUser($value['user_id'])['last_name']}}</td>
                            <td>{{getUser($value['user_id'])['email']}}</td>
                            <td>{{getUser($value['user_id'])['phone']}}</td>
                            <td>{{getProduct($value['course'])['title']}}</td>
                            <td>{{getProduct($value['workshop'])['title']}}</td>
                            <td>{{date_format($value['created_at'],'d/m/Y')}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
		</div>
	</div>

</div>
@endsection
@section('customScripts')
<script src="{{asset('/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/plugins/datatables/dataTables.bootstrap.js')}}"></script>
<script src="{{asset('/plugins/datatables/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('/plugins/datatables/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset('/plugins/datatables/buttons.html5.min.js')}}"></script>
<script src="{{asset('/plugins/datatables/buttons.print.min.js')}}"></script>
<script src="{{asset('/plugins/datatables/pdfmake.min.js')}}"></script>
<script src="{{asset('/plugins/datatables/vfs_fonts.js')}}"></script>
<script src="{{asset('/plugins/datatables/dataTables.colVis.js')}}"></script>
<script type="text/javascript">
	$('#datatable').dataTable({
        "dom": 'TC<"clear">Bfrtip',
        "buttons": [{
            extend: "csv",
            className: "btn-sm"
        }, {
            extend: "excel",
            className: "btn-sm"
        }, {
            extend: "pdf",
            className: "btn-sm"
        }, {
            extend: "print",
            className: "btn-sm"
        }],
        "colVis": {
                "buttonText": "Change columns"
            },
        initComplete: function () {
            this.api().columns('#filter-course').every( function () {
                var column = this;
                var select = $('.filter-course')
                    //.appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var search = [];

                          $.each($('.filter-course option:selected'), function(){
                              search.push($(this).val());
                          });
                          
                          search = search.join('|');
                        column
                            .search( search, true, false )
                            .draw();
                    } );
                column.data().unique().sort().each( function ( d, j ) {
                    if(d!="")
                    {
                      select.append( '<option value="'+d+'">'+d+'</option>' )
                    }
                });
            });

            this.api().columns('#filter-workshop').every( function () {
                var column = this;
                var select = $('.filter-workshop')
                    //.appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var search = [];

                          $.each($('.filter-workshop option:selected'), function(){
                              search.push($(this).val());
                          });
                          
                          search = search.join('|');
                        column
                            .search( search, true, false )
                            .draw();
                    } );
                column.data().unique().sort().each( function ( d, j ) {
                    if(d!="")
                    {
                      select.append( '<option value="'+d+'">'+d+'</option>' )
                    }
                });
            });

            /*this.api().columns('#filter-learner').every( function () {
                var column = this;
                var select = $('.filter-learner')
                    //.appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var search = [];

                          $.each($('.filter-learner option:selected'), function(){
                              search.push($(this).val());
                          });
                          
                          search = search.join('|');
                        column
                            .search( search, true, false )
                            .draw();
                    } );
                column.data().unique().sort().each( function ( d, j ) {
                    if(d!="")
                    {
                      select.append( '<option value="'+d+'">'+d+'</option>' )
                    }
                });
            });*/
        }
    });
</script>

@endsection