@extends('layouts.backend')
@section('customStyles')
<link href="{{asset('/plugins/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('/plugins/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
<style type="text/css">
    table{
      margin: 0 auto;
      width: 100%;
      clear: both;
      border-collapse: collapse;
      table-layout: fixed; 
      word-wrap:break-word;
    }
    .loader {
        float: right;
        margin-left: 10px;
    }
</style>
@if(check_access(Auth::user()->id,'guide','_show')==1)
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="page-title-box">
                <h4 class="page-title">Guide </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Admin</a>
                    </li>
                    <li class="active">
                        All Guides
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card-box table-responsive">
                @if(check_access(Auth::user()->id,'guide','_create')==1)
                <a download href="https://universitiespage.com/guides_sitemap.xml" class="btn btn-success btn-md pull-right" style="margin-bottom: 10px;">Generate Site-map</a>
                <a href="{{route('guide.create')}}" class="btn btn-primary btn-md pull-right" style="margin-bottom: 10px;margin-right:10px;">Add Guide</a>
                @endif
                <h4 class="m-t-0 header-title"><b>Guide List</b></h4>

                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Author</th>
                        <th>Active</th>
                        <th>Popular</th>
                        <th>Created at</th>
                        @if(check_access(Auth::user()->id,'guide','_edit')==1)
                        <th>Action</th>
                        @endif
                    </tr>
                    </thead>


                    <tbody>
                	@foreach($data as $value)
                	<tr>
                        <td>{{$value->title}}/ <a href="{{url('guides/'.$value->slug)}}" target="_blank"><i class="fa fa-eye"></i></a></td>
                        <td>{{$value->guide_type}}</td>
                		<td>{{($value->user->first_name)??''}}</td>
                		<td>{{($value->is_active==1)?'Yes':'No'}}</td>
                        <td valign="middle">
                            <div class="form-group">
                                <input id="comment_Approvel{{$value->id}}" class="mark_featured" switch="primary" data-id="{{$value->id}}" type="checkbox" @if($value->is_featured == 1) checked="checked" @endif>
                                <label for="comment_Approvel{{$value->id}}" data-on-label="Yes" data-off-label="No"></label>
                                <span class="loader"></span>
                            </div>
                        </td>
                        <td>{{$value->created_at}}</td>
                        @if(check_access(Auth::user()->id,'guide','_edit')==1)
                		<td><a href="{{route('guide.edit',$value->id)}}" class="btn btn-warning btn-md">Edit</a></td>
                        @endif
                	</tr>
                	@endforeach

                    </tbody>
                </table>
                <div> <!-- by sadam -->
                    
                    <?php 
                    if($data)
                    { 
                        $baseURL = "https://www.universitiespage.com/";
                        $string = '<?xml version="1.0" encoding="UTF-8"?> <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
                        
                        foreach($data as $slug)
                        { 
                            $string .= '<url>';
                            $string .= '<loc>'.$baseURL.'guides/'.(isset($slug->slug)? $slug->slug : '').'</loc>';
                            $string .= '<lastmod>'.date('Y-m-d').'</lastmod>';
                            $string .= '</url>';
                            
                        }
                        
                        $string .='</urlset>';
                        file_put_contents("guides_sitemap.xml", $string);
                    
                    }
                   ?>
                </div> <!-- end by sadam -->
            </div>
		</div>
	</div>

</div>
@else
@component('admin.access-denied') @endcomponent
@endif
@endsection
@section('customScripts')
<script src="{{asset('/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/plugins/datatables/dataTables.bootstrap.js')}}"></script>
<script type="text/javascript">
	$('#datatable').dataTable();
    $(document).on('change','.mark_featured',function(){
        var $loader = $(this).parent().find('.loader');
        $loader.html("<i class='fa fa-refresh fa-spin'></i>");
        var data = { '_token':"{{csrf_token()}}", 'id':$(this).data('id') };
        jQuery.ajax({
            url:'{{route("ajaxPopularGuide")}}',
            type: 'post',
            dataType: 'html',
            data: data,
            success: function( data ){
                $loader.html("");
            }
        });
    });
</script>

@endsection