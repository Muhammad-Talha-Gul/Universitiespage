@extends('layouts.backend')
@section('customStyles')
<link href="{{asset('plugins/bootstrap-sweetalert/sweet-alert.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Edit Custom Post Types </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Admin</a>
                    </li>
                    <li class="active">
                        Edit Post Types
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{route('post_type.update',$data['id'])}}"> 
                <input type="hidden" name="_method" value="PUT">
                {{csrf_field()}}
                <div class="card-box table-responsive">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Name</label>
                                <div class="col-md-10">
                                    <input type="text" name="name" class="form-control" placeholder="ex: Blog, News" style="margin-bottom:10px;" value="{{$data['name']}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Sort Order</label>
                                <div class="col-md-10">
                                    <input type="number" name="sort_order" class="form-control" value="{{$data['sort_order']}}" min="0" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-box table-responsive">
                    <h4 class="m-t-0 header-title"><b>Configuration</b></h4>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-md-8">Has Short Description</label>
                                <div class="col-md-4">
                                    <input type="checkbox" id="switch22" name="has_desc" switch="primary" value="1" {{($data['has_desc']==1)?'checked':''}} />
                                    <label for="switch22" data-on-label="Yes" data-off-label="No"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-md-8">Has Description</label>
                                <div class="col-md-4">
                                    <input type="checkbox" id="switch23" name="has_long_desc" switch="primary" value="1" {{($data['has_long_desc']==1)?'checked':''}} />
                                    <label for="switch23" data-on-label="Yes" data-off-label="No"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-md-8">Has Post Seo?</label>
                                <div class="col-md-4">
                                    <input type="checkbox" id="switch1" name="has_post_seo" switch="primary" value="1" {{($data['has_post_seo']==1)?'checked':''}} />
                                    <label for="switch1" data-on-label="Yes" data-off-label="No"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-md-8">Is Category Enable?</label>
                                <div class="col-md-4">
                                    <input type="checkbox" id="switch2" name="is_category_enable" switch="primary" {{($data['is_category_enable']==1)?'checked':''}} value="1" />
                                    <label for="switch2" data-on-label="Yes" data-off-label="No"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-md-8">Has Featured Image</label>
                                <div class="col-md-4">
                                    <input type="checkbox" id="switch3" name="has_featured_image" switch="primary" value="1" {{($data['has_featured_image']==1)?'checked':''}} />
                                    <label for="switch3" data-on-label="Yes" data-off-label="No"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-md-8">Has Author</label>
                                <div class="col-md-4">
                                    <input type="checkbox" id="switch33" name="has_author" switch="primary" value="1" {{($data['has_author']==1)?'checked':''}} />
                                    <label for="switch33" data-on-label="Yes" data-off-label="No"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-md-8">Image Gallery</label>
                                <div class="col-md-4">
                                    <input type="checkbox" id="switch123" name="has_image_gallery" switch="primary" value="1" {{($data['has_image_gallery']==1)?'checked':''}} />
                                    <label for="switch123" data-on-label="Yes" data-off-label="No"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-md-8">Has SKU</label>
                                <div class="col-md-4">
                                    <input type="checkbox" id="switch124" name="show_sku" switch="primary" class="checklist" value="1" {{($data['show_sku']==1)?'checked':''}} />
                                    <label for="switch124" data-on-label="Yes" data-off-label="No"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-md-8">Show Price</label>
                                <div class="col-md-4">
                                    <input type="checkbox" class="checklist" id="switch125" name="show_price" switch="primary" value="1" {{($data['show_price']==1)?'checked':''}} />
                                    <label for="switch125" data-on-label="Yes" data-off-label="No"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-md-8">Show Discount</label>
                                <div class="col-md-4">
                                    <input type="checkbox" id="switch127" name="show_discount" switch="primary" value="1" {{($data['show_discount']==1)?'checked':''}} />
                                    <label for="switch127" data-on-label="Yes" data-off-label="No"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-md-8">Show Quantity</label>
                                <div class="col-md-4">
                                    <input type="checkbox" class="checklist" id="switch128" name="show_quantity" switch="primary" value="1" {{($data['show_quantity']==1)?'checked':''}} />
                                    <label for="switch128" data-on-label="Yes" data-off-label="No"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-md-8">Has Brands</label>
                                <div class="col-md-4">
                                    <input type="checkbox" id="switch133" name="has_brands" switch="primary" value="1" {{($data['has_brands']==1)?'checked':''}} />
                                    <label for="switch133" data-on-label="Yes" data-off-label="No"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h6>Additional Settings</h6>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-md-8">Enable Filters</label>
                                <div class="col-md-4">
                                    <input type="checkbox" id="switch129" name="filters" switch="primary" value="1" {{($data['filters']==1)?'checked':''}} />
                                    <label for="switch129" data-on-label="Yes" data-off-label="No"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-md-8">Is Importable?</label>
                                <div class="col-md-4">
                                    <input type="checkbox" id="switch130" name="importable" switch="primary" value="1" {{($data['importable']==1)?'checked':''}} />
                                    <label for="switch130" data-on-label="Yes" data-off-label="No"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-md-8">Inventory Enabled?</label>
                                <div class="col-md-4">
                                    <input type="checkbox" id="inventory" name="inventory_enabled" switch="primary" value="1" {{($data['inventory_enabled']==1)?'checked':''}} />
                                    <label for="inventory" data-on-label="Yes" data-off-label="No"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-md-8">Has Related</label>
                                <div class="col-md-4">
                                    <input type="checkbox" id="switch568" name="has_related" switch="primary" value="1" {{($data['has_related']==1)?'checked':''}} />
                                    <label for="switch568" data-on-label="Yes" data-off-label="No"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-md-8">Enable Logs</label>
                                <div class="col-md-4">
                                    <input type="checkbox" id="switch598" name="has_logs" switch="primary" value="1" {{($data['has_logs']==1)?'checked':''}} />
                                    <label for="switch598" data-on-label="Yes" data-off-label="No"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-box table-responsive">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Active</label>
                                <input type="checkbox" name="is_active" value="1" {{($data['is_active']==1)?'checked':''}}>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" value="Update">
                            <a href="javascript:void(0)" class="btn btn-danger" onclick="deleteit()">Delete</a>
                            <a href="{{route('post_type.index')}}" class="btn btn-success">Back</a>
                        </div>
                    </div>
                </div>
            </form>

            <form action="{{route('post_type.destroy',$data['id'])}}" method="POST" id="delete-form">
                <input type="hidden" name="_method" value="DELETE">
                {{csrf_field()}}
            </form>
        </div>
    </div>

</div>
@endsection
@section('customScripts')
<script src="{{asset('plugins/bootstrap-sweetalert/sweet-alert.min.js')}}"></script>
<script type="text/javascript">
    function deleteit() {
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this!",
            type: "error",
            showCancelButton: true,
            cancelButtonClass: 'btn-default btn-md waves-effect',
            confirmButtonClass: 'btn-danger btn-md waves-effect waves-light',
            confirmButtonText: 'Delete!',
        },function() {
              $("#delete-form").submit();
        });
    }
</script>
<script type="text/javascript">
    $(function(){
        $("#inventory").on('change',function(){
            $(".checklist").prop('checked', this.checked);
        });
        $(".checklist").on('change',function(){
            if($("#inventory").is(':checked')) {
                if(!$(this).is(':checked')) {
                    alert("Can't disabled this, disable inventory first");
                    $(this).attr('checked','checked');
                }
            }
        });
    });
</script>
@endsection