<?php $__env->startSection('customStyles'); ?>
<link href="<?php echo e(asset('/plugins/datatables/jquery.dataTables.min.css')); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo e(asset('/plugins/datatables/dataTables.bootstrap.min.css')); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo e(asset('plugins/bootstrap-sweetalert/sweet-alert.css')); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo e(asset('plugins/toastr/toastr.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset("plugins/bootstrap-daterangepicker/daterangepicker.css")); ?>" rel="stylesheet">
<style type="text/css">
    figure.featured_image img {
        width: 50px;
        height: 50px;
        object-fit: contain;
        border: 1px solid #782572;
    }
    .loader {
        float: right;
        margin-left: 10px;
    }
    #dup-errors {text-align: left;}
    #dup-errors span { color: green; }
    #dup-errors p { color: red; }
    #dup-errors ul {
        height: 180px;
        overflow-x: scroll;
    }
    #dup-errors ul li {
        color: red;
    }
    .pagination {margin: 0px;}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php if(check_access(Auth::user()->id,'products','_show')==1): ?>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="page-title-box">
                <h4 class="page-title"><?php echo e($type['name']); ?></h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="<?php echo e(url('/admin/home')); ?>">Admin</a>
                    </li>
                    <li class="active">
                        <?php echo e($type['name']); ?>

                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">            
            <?php if(Session::has('success')): ?>
            <div class="alert alert-success">
                <p><?php echo e(Session::get('success')); ?></p>
            </div>
            <?php elseif(Session::has('error')): ?>
            <div class="alert alert-danger">
                <p><?php echo e(Session::get('error')); ?></p>
            </div>
            <?php endif; ?>                
            <div class="form-group pull-right" style="margin-bottom: 10px;">
                <?php if(check_access(Auth::user()->id,'products','_delete')==1): ?>
                <form action="<?php echo e(route('deleteAllPosts')); ?>" method="POST" id="del_form" form="del_form"><?php echo e(csrf_field()); ?></form>
                <a class="btn btn-danger btn-sm" id="deleteAll">Delete (<span id="checkCount">0</span>)</a>
                <?php endif; ?>
                <?php if(check_access(Auth::user()->id,'products','_import')==1): ?>
                <?php if($type['importable']==1): ?>
                <a href="javascript:void(0)" data-toggle="modal" data-target="#importModal" class="btn btn-success btn-sm">Import <?php echo e($type['name']); ?></a>
                <a href="javascript:void(0)" data-toggle="modal" data-target="#exportModal" class="btn btn-info btn-sm">Export <?php echo e($type['name']); ?></a>
                <?php endif; ?>
                <?php endif; ?>
                <?php if(check_access(Auth::user()->id,'products','_create')==1): ?>
                <a href="<?php echo e(route('create_post',$type['slug'])); ?>" class="btn btn-primary btn-sm">Add <?php echo e($type['name']); ?></a>
                <?php endif; ?>
            </div>
            <div class="clearfix"></div>
            <div class="form-group search-box">
                <form>
                    <input type="text" id="search-input" class="form-control product-search" placeholder="Search here..." name="q" value="<?php echo e(isset($_GET['q']) ? $_GET['q'] : ''); ?>">
                    <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <div class="clearfix"></div>

            <div class="card-box table-responsive">                
                <h4 class="m-t-0 header-title"><b><?php echo e($type['name']); ?> List</b></h4>
                <table id="" class="table hover">
                    <thead>
                    <tr>
                        <th>
                            <div class="checkbox checkbox-primary m-r-15 m-l-5">
                                <input type="checkbox" id="check_all">
                                <label for="check_all"></label>
                            </div>
                        </th>
                        <?php if($type['has_featured_image']==1): ?><th>Image</th><?php endif; ?>
                        <th>Title</th>
                        <?php if($type['is_category_enable']==1): ?><th>Category</th><?php endif; ?>
                        <?php if($type['has_brands']==1): ?><th>Brand</th><?php endif; ?>
                        <?php if($type['show_sku']==1): ?><th>SKU</th><?php endif; ?>
                        <?php if($type['show_quantity']==1): ?><th>Quantity</th><?php endif; ?>
                        <?php if($type['show_price']==1): ?><th>Price</th><?php endif; ?>
                        <th>Active</th>
                        <th>Is Featured</th>
                        <th>Created at</th>
                        <?php if(check_access(Auth::user()->id,'products','_edit')==1): ?>
                        <th>Action</th>
                        <?php endif; ?>
                    </tr>
                    </thead>


                    <tbody>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <div class="checkbox checkbox-primary m-r-15 m-l-5">
                                <input id="c_<?php echo e($key); ?>" type="checkbox" class="checkItem" name="ids[]" form="del_form" value="<?php echo e($value->id); ?>" >
                                <label for="c_<?php echo e($key); ?>"></label>
                            </div>
                        </td>
                        <?php if($type['has_featured_image']==1): ?>
                        <td><figure class="featured_image">
                                <?php if(filter_var($value->image, FILTER_VALIDATE_URL)): ?>
                                <img src="<?php echo e($value->image); ?>" width="100">
                                <?php elseif(!empty($value->image)): ?>
                                <img src="<?php echo e(url(getThumb($value->image))); ?>" width="100">
                                <?php else: ?>
                                <img src="<?php echo e(asset('placeholder.jpg')); ?>" width="100">
                                <?php endif; ?>    
                            </figure>
                        </td>
                        <?php endif; ?>
                        <td><?php echo e($value->title); ?></td>
                        <?php if($type['is_category_enable']==1): ?>
                        <td><?php echo e((isset($value->category->name)?$value->category->name:'')); ?></td>
                        <?php endif; ?>
                        <?php if($type['has_brands']==1): ?>
                        <td></td>
                        <?php endif; ?>
                        <?php if($type['show_sku']==1): ?>
                        <td><?php echo e($value->sku); ?></td>
                        <?php endif; ?>
                        <?php if($type['show_quantity']==1): ?>
                        <td><?php echo e($value->quantity); ?></td>
                        <?php endif; ?>
                        <?php if($type['show_price']==1): ?>
                        <td><?php echo e($value->price); ?></td>
                        <?php endif; ?>
                        <td><?php echo e(($value->is_active==1)?'Yes':'No'); ?></td>
                        <td>
                            <div class="form-group">
                                <input type="checkbox" id="featured_<?php echo e($value->id); ?>" class="mark_featured" switch="primary" data-id="<?php echo e($value->id); ?>" value="1" <?php echo e(($value['is_featured']==1)?'checked':''); ?> />
                                <label for="featured_<?php echo e($value->id); ?>" data-on-label="Yes" data-off-label="No">
                                </label>
                                <span class="loader"></span>
                            </div>
                        </td>
                        <td><?php echo e($value->created_at); ?></td>
                        <?php if(check_access(Auth::user()->id,'products','_edit')==1): ?>
                        <td>
                            <a href="<?php echo e(route('edit_post',['slug'=>$type['slug'],'id'=>$value->id])); ?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                            <a href="javascript:void(0)" class="btn btn-primary btn-xs duplicateThis" data-title="<?php echo e($value->title); ?>" data-id="<?php echo e($value->id); ?>"><i class="fa fa-copy"></i></a>
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>                
            </div>
            <div class="row">
                <div class="col-md-4 form-group">
                    <label>Total Entries: <?php echo e($data->total()); ?></label>
                </div>
                <div class="col-md-8 form-group text-right">
                    <?php echo e($data->links()); ?>

                </div>
            </div>
		</div>
	</div>

</div>
<div id="importModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Import <?php echo e($type['name']); ?></h4>
      </div>
      <div class="modal-body">
        <form id="importForm">
            <div class="form-group">
              <label>Select File (.csv)</label>
              <?php echo e(csrf_field()); ?>

              <input type="file" name="file" class="form-control">
              <input type="hidden" name="type" value="<?php echo e($type['id']); ?>">
            </div>
            <?php if($type['is_category_enable']==1): ?>
            <p>Please enter category IDs in CSV for link Categories with your <?php echo e($type['name']); ?>. <b><a href="<?php echo e(route('category.index')); ?>" target="_blank">Click here for Category IDs</a></b></p>
            <?php endif; ?>
            <a href="<?php echo e(route("downloadSample",$type['slug'])); ?>" class="btn btn-info btn-sm">Sample CSV</a>
            <input type="submit" class="btn btn-sm btn-success" value="Start Import">
        </form>
      </div>
      <div class="modal-footer" style="display: none;">
        <div class="progress">
            <div class="progress-bar progress-bar-primary progress-bar-striped active" role="progressbar" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
            </div>
        </div>
        <div id="dup-errors"></div>
        
      </div>
    </div>

  </div>
</div>
<div id="duplicateModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Duplicate <?php echo e(str_singular($type['name'])); ?></h4>
      </div>
      <div class="modal-body">
          <form action="<?php echo e(route('duplicatePost')); ?>" method="POST">
              <?php echo e(csrf_field()); ?>

              <div class="form-group">
                  <input type="hidden" id="post-id" name="id">
                  <input type="text" class="form-control" name="title" id="post-title" required>
              </div>
              <div class="text-center">
                  <input type="submit" class="btn btn-success" value="Duplicate">
              </div>
          </form>
      </div>
    </div>

  </div>
</div>
<div id="exportModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Export <?php echo e($type['name']); ?></h4>
      </div>
      <div class="modal-body">
        <form id="exportForm" action="<?php echo e(route('exportPosts')); ?>" method="POST">
            <?php echo e(csrf_field()); ?>

            <div class="form-group">
                <input type="text" class="form-control" id="reportrange" autocomplete="off" name="dates" required>
                <input type="hidden" name="post_type" value="<?php echo e($type['id']); ?>">
            </div>
            <div class="form-group">
                <select class="form-control" name="type" required>
                    <option value="xlsx">XLSX</option>
                    <option value="csv">CSV</option>
                </select>
            </div>
            <div class="form-group text-center">
                <input type="submit" class="btn btn-md btn-success" style="width: 100%;" value="Export">
            </div>
        </form>
      </div>
    </div>

  </div>
</div>
<?php else: ?>
<?php $__env->startComponent('admin.access-denied'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('customScripts'); ?>
<script src="<?php echo e(asset('/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('/plugins/datatables/dataTables.bootstrap.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bootstrap-sweetalert/sweet-alert.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/toastr/toastr.min.js')); ?>"></script>
<script src="<?php echo e(asset("plugins/moment/moment.js")); ?>"></script>
<script src="<?php echo e(asset("plugins/bootstrap-daterangepicker/daterangepicker.js")); ?>"></script>
<script type="text/javascript">
	$('#datatable').dataTable();
    $("#check_all").click(function(){
        $(':checkbox.checkItem').prop('checked', this.checked);
        $("#checkCount").text($(':checkbox.checkItem:checked').length);
    });
    $(".checkItem").on('click',function(){ $("#checkCount").text($(':checkbox.checkItem:checked').length); });
    $(document).ready(function (e) {
        $("#importForm").on('submit',function(e) {
            $(".modal-footer").show(100);
            e.preventDefault();
            $.ajax({
                url: "<?php echo e(route('importPosts')); ?>",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(data)
                {
                    html = "<p><span>Products Imported</span> Below products are not imported because of same <b>SKU Codes</b></p>";
                    html += "<ul>";
                    if(data==="inserted") {
                        $(".modal-footer").hide(100);
                        location.reload();
                    } else {
                        $(".progress-bar").hide(300);
                        $.each(data, function( index, value ) {
                          html += "<li>"+value+"</li>";
                        });
                        html += "</ul>";
                        $("#dup-errors").html(html);
                    }
                }
            });
        });
    });
    $(document).on('click','#deleteAll',function(e){
        if($('.checkItem').is(':checked')){
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this!",
                type: "error",
                showCancelButton: true,
                cancelButtonClass: 'btn-default btn-md waves-effect',
                confirmButtonClass: 'btn-danger btn-md waves-effect waves-light',
                confirmButtonText: 'Delete!',
            },function() {
                  $("#del_form").submit();
            });
        } 
        else {
            toastr.error('Please Select Items', 'Error!');
        }
    });
    $(document).on('change','.mark_featured',function(){
        var $loader = $(this).parent().find('.loader');
        $loader.html("<i class='fa fa-refresh fa-spin'></i>");
        var data = { '_token':"<?php echo e(csrf_token()); ?>", 'id':$(this).data('id') };
        jQuery.ajax({
            url:'<?php echo e(route("ajaxFeaturedPost")); ?>',
            type: 'post',
            dataType: 'html',
            data: data,
            success: function( data ){
                $loader.html("");
            }
        });
    });
    $(".duplicateThis").click(function(){
        $("#post-id").val($(this).data('id'));
        $("#post-title").val("Copy of "+$(this).data('title'));
        $("#duplicateModal").modal("show");
    });

    $(function(){
            $('#reportrange span').html(moment().format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

            $('#reportrange').daterangepicker({
                format: 'MM/DD/YYYY',
                startDate: moment(),
                endDate: moment(),
                dateLimit: {
                    days: 60
                },
                showDropdowns: true,
                showWeekNumbers: true,
                timePicker: false,
                timePickerIncrement: 1,
                timePicker12Hour: true,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                opens: 'left',
                drops: 'down',
                buttonClasses: ['btn', 'btn-sm'],
                applyClass: 'btn-success',
                cancelClass: 'btn-default',
                separator: ' to ',
                locale: {
                    applyLabel: 'Submit',
                    cancelLabel: 'Cancel',
                    fromLabel: 'From',
                    toLabel: 'To',
                    customRangeLabel: 'Custom',
                    daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                    monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    firstDay: 1
                }
            });
        });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>