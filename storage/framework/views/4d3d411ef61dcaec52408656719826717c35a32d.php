<?php ini_set('memory_limit', '-1'); ?>

<?php $__env->startSection('customStyles'); ?>
<link href="<?php echo e(asset('/plugins/datatables/jquery.dataTables.min.css')); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo e(asset('/plugins/datatables/dataTables.bootstrap.min.css')); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo e(asset('plugins/bootstrap-sweetalert/sweet-alert.css')); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo e(asset('plugins/toastr/toastr.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php if(check_access(Auth::user()->id,'course','_show')==1): ?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Course </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="<?php echo e(url('/admin/home')); ?>">Admin</a>
                    </li>
                    <li class="active">
                        Course
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 ">
            <div class="card-box table-responsive">
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
                    
                    <?php if(check_access(Auth::user()->id,'subject','_create')==1): ?>
                        <a style="cursor:pointer" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addSubject">New Subject</a>
                        <div id="addSubject" class="modal fade" role="dialog"  >
                            <div class="modal-dialog" style=" min-width:600px;">

                                <!-- Modal content-->
                                <form action="<?php echo e(route('subject.store')); ?>" method="POST">
                                    <?php echo e(csrf_field()); ?>

                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">New Subject</h4>
                                        </div>
                                        <div class="modal-body row">
                                            <div class="col-md-12" style="margin-top: 10px;width: 100%;">
                                                <div class="form-group">
                                                    <label class="col-md-12 control-label">Name</label>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control" name="name" placeholder="Subject Name" value="<?php echo e(old('name')); ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" class="btn btn-default" value="Save">
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(check_access(Auth::user()->id,'course','_create')==1): ?>
                        <a href="<?php echo e(route('course.create')); ?>" class="btn btn-primary btn-sm">New Course</a>
                        <a download href="https://universitiespage.com/course_sitemap.xml" class="btn btn-success btn-sm" >Generate Site-map</a>

                    <?php endif; ?>
                    <div class="search-container" style="
    margin-top: 10px;
    border-radius: 5px;
">
                        <input onkeyup="searchDataAgain(this)" type="text" style="
    border-radius: 5px;
" placeholder="Search.." id="courses"  class="search-data" name="search">
                        <button type="submit" style="
    border-radius: 5px;
"><i class="fa fa-search" onclick="searchCourse(this)"></i></button>
                    </div>
                </div>
                    <div class="Courses">
            <?php echo $__env->make('admin.course_partial',[$data], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>

        </div>
        </div>
    </div>

</div>

<?php else: ?>
<?php $__env->startComponent('admin.access-denied'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('customScripts'); ?>


<script src="<?php echo e(asset('assets_frontend/js/jquery.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bootstrap-sweetalert/sweet-alert.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/toastr/toastr.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets_frontend/js/axios.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.min.js" ></script>

<script type="text/javascript">
    // $('#datatable').dataTable({
    //     sort:false,
    // });
    // $(function () {
    //
    //     let info;
    //     $('#datatable').DataTable({
    //         "serverSide": true,
    //         "processing": true,
    //         "ajax": {
    //             url:'/admin-courses',
    //             data: function(d){
    //                 var getPageNumber = $('#datatable').DataTable().page.info();
    //                 console.log(getPageNumber)
    //                 d.page =  getPageNumber.page + 1;
    //             },
    //         },
    //         "columns": [
    //             { "data": "Name" },
    //             { "data": "Universities" },
    //             { "data":  "Subject" },
    //             { "data":  "Qualification" },
    //             { "data": "Popular" },
    //             { "data": "Created at"},
    //             { "data": "Action"},
    //             // { "data": "delete"},
    //         ],
    //
    //
    //     });
    //
    // });


    function deleteit(id) {
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this!",
            type: "error",
            showCancelButton: true,
            cancelButtonClass: 'btn-default btn-md waves-effect',
            confirmButtonClass: 'btn-danger btn-md waves-effect waves-light',
            confirmButtonText: 'Delete!',
        },function() {
              $("#delete-form-"+id).submit();
        });
    }
    function popular(id){
        $.ajax({
            url: "/admin/"+id,
            success: function(result){
              window.location.reload()
            }});
    }
    // $('.search-data').keyup(function () {
    //     let a =  $('.search-data').val()
    //    if (a.length > 3) {
    //        console.log(a.length)
    //        // $(document).on('keypress',function(e) {
    //        // if(e.which == 13) {
    //        searchCourse();
    //        // }
    //        // });
    //    }
    // });

    function searchDataAgain(input){
        let a = $(input).val();
        if (a.length > 2) {
                searchCourse();
            } else if (a.length === 0) {
                searchCourse();
            }

    }
    function searchCourse(input){
        let courses = $('#courses').val();
        axios.get('/admin-course/'+courses).then(function (response) {
            // console.log(response)
            $('.Courses').empty();
            $('.Courses').append(response.data)
        });
    }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>