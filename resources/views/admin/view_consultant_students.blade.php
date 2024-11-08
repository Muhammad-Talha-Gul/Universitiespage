
@extends('layouts.backend')
@section('customStyles')
<link href="{{asset('/plugins/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('/plugins/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('plugins/bootstrap-sweetalert/sweet-alert.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('plugins/toastr/toastr.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<style type="text/css">
    .loader {
        float: right;
        margin-left: 10px;
    }
</style>
@if(check_access(Auth::user()->id,'student','_show')==1)
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Consultant Students</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Admin</a>
                    </li>
                    <li class="active">
                        Consultant Students
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card-box table-responsive">
                @if(Session::has('success'))
                <div class="alert alert-success">
                    <p>{{Session::get('success')}}</p>
                </div>
                @elseif(Session::has('error'))
                <div class="alert alert-danger">
                    <p>{{Session::get('error')}}</p>
                </div>
                @endif
                <div class="form-group pull-right" style="margin-bottom: 10px;">
                    {{-- <form action="#" method="POST" id="del_form" form="del_form">{{csrf_field()}}</form>
                    <a class="btn btn-danger btn-sm" id="deleteAll">Delete (<span id="checkCount">0</span>)</a> --}}
                    @if(check_access(Auth::user()->id,'student','_create')==1)
                    {{-- <a href="{{route('student.create')}}" class="btn btn-primary btn-sm">New Page</a> --}}
                    @endif
                </div>
                <h4 class="m-t-0 header-title"><b>Consultant Students List</b></h4>                
                <table id="datatable" class="table hover">
                    <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Passport #</th>
                    <th scope="col">Intrested Country</th>
                    <th scope="col">Course</th>
                    <th scope="col">Documents</th>
                    <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>

<?php

$i=1;

foreach($cstudents as $cstudent) { ?>

  <tr id="row<?php echo $cstudent->id; ?>">
    <th scope="row"><?php echo $i; $i++; ?></th>
    <td id="name<?php echo $cstudent->id; ?>"><?php echo $cstudent->name; ?></td>
    <td id="passport_number<?php echo $cstudent->id; ?>"><?php echo $cstudent->passport_number; ?></td>
    <td id="intrested_country_doc<?php echo $cstudent->id; ?>"><?php echo $cstudent->intrested_country_doc; ?></td>
    <td id="course_doc<?php echo $cstudent->id; ?>"><?php echo $cstudent->course_doc; ?></td>
    <td>
      
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#recordmodal<?php echo $cstudent->id; ?>">
View
</button>
    </td>
    <td>


    <button data-toggle="modal" data-target="#editmodal<?php echo $cstudent->id; ?>" class="btn btn-success"><i class="fa fa-graph"> Report</i></button>

    </td>
  </tr>


  <div class="modal fade" id="recordmodal<?php echo $cstudent->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalCenterTitle">Documents</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body" style="overflow: scroll; height: 100vh;">
      
    <style>
      .artigo_nome {
  border: 1px dotted blue;
  display: inline-block;
  max-width: 250px;
  padding: 10px;
  word-break: break-all; /* optional */
}
    </style>

    <!-- <div class="row" id="course_docrow">
    
    <div class="col-md-12" style="margin-bottom: 10px;"><h5 style="color: black;">Course Documents

</h5></div> 
 
      <?php 
          $course_docs = json_decode($cstudent->course_doc);
  
  
     if($course_docs != '[]') {
            
     foreach($course_docs as $course_doc) {

      ?>
      
      <div class="col-md-2" id="doc<?php echo str_replace(".", "", $course_doc); ?>">
        <h6 class="artigo_nome"><?php echo $course_doc; ?></h6>
        <a target="_blank" href="<?php echo '../public/assets_frontend/cstudent/'.$course_doc; ?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
       
      </div>
      
      <?php

      }

       }
  
      ?>

    </div> -->


    <!-- passport --> <br>


    <div class="row" id="passport_docrow"> 
<div class="col-md-12" style="margin-bottom: 10px;"><h5 style="color: black;">Passport Documents
</h5></div> 
<?php 
  $passport_docs = json_decode($cstudent->passport_doc);
if($passport_docs != '[]') {
foreach($passport_docs as $passport_doc) {
?>
<div class="col-md-2" id="doc<?php echo str_replace(".", "", $passport_doc); ?>">
<h6 class="artigo_nome"><?php echo $passport_doc; ?></h6>
<a target="_blank" href="<?php echo '../public/assets_frontend/cstudent/'.$passport_doc; ?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
</div>
<?php
}

}

?>

</div>
  

<!-- photos --> <br>


<div class="row" id="photo_docrow">
    
      
<div class="col-md-12" style="margin-bottom: 10px;"><h5 style="color: black;">Photos

</h5></div> 

<?php 
  $photo_docs = json_decode($cstudent->photo_doc);


if($photo_docs != '[]') {
    
foreach($photo_docs as $photo_doc) {

?>

<div class="col-md-2" id="doc<?php echo str_replace(".", "", $photo_doc); ?>">
<h6 class="artigo_nome"><?php echo $photo_doc; ?></h6>
<a target="_blank" href="<?php echo '../public/assets_frontend/cstudent/'.$photo_doc; ?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
</div>

<?php

}

}

?>

</div>


<!-- Educational Degree --> <br>

<div class="row" id="educational_degree_docrow">
    
      
<div class="col-md-12" style="margin-bottom: 10px;"><h5 style="color: black;">Educational Degree Documents



</h5></div> 

<?php 
  $educational_degree_docs = json_decode($cstudent->educational_degree_doc);


if($educational_degree_docs != '[]') {
    
foreach($educational_degree_docs as $educational_degree_doc) {

?>

<div class="col-md-2" id="doc<?php echo str_replace(".", "", $educational_degree_doc); ?>">
<h6  class="artigo_nome"><?php echo $educational_degree_doc; ?></h6>
<a target="_blank" href="<?php echo '../public/assets_frontend/cstudent/'.$educational_degree_doc; ?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
</div>

<?php

}

}

?>

</div>




<!-- Educational Certificate --> <br>


<div class="row" id="educational_certificate_docrow">
    
      
<div class="col-md-12" style="margin-bottom: 10px;"><h5 style="color: black;">Educational Certificates Documents

</h5></div> 

<?php 
  $educational_certificate_docs = json_decode($cstudent->educational_certificate_doc);


if($educational_certificate_docs != '[]') {
    
foreach($educational_certificate_docs as $educational_certificate_doc) {

?>

<div class="col-md-2" id="doc<?php echo str_replace(".", "", $educational_certificate_doc); ?>">
<h6 class="artigo_nome"><?php echo $educational_certificate_doc; ?></h6>
<a target="_blank" href="<?php echo '../public/assets_frontend/cstudent/'.$educational_certificate_doc; ?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
</div>

<?php

}

}

?>

</div>



<!-- Recomendation Letter --> <br>


<div class="row" id="recomendation_letter_docrow">
    
      
<div class="col-md-12" style="margin-bottom: 10px;"><h5 style="color: black;">Recomendation Letter Documents

</h5></div> 

<?php 
  $recomendation_letter_docs = json_decode($cstudent->recomendation_letter_doc);


if($recomendation_letter_docs != '[]') {
    
foreach($recomendation_letter_docs as $recomendation_letter_doc) {

?>

<div class="col-md-2" id="doc<?php echo str_replace(".", "", $recomendation_letter_doc); ?>">
<h6 class="artigo_nome"><?php echo $recomendation_letter_doc; ?></h6>
<a target="_blank" href="<?php echo '../public/assets_frontend/cstudent/'.$recomendation_letter_doc; ?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
</div>

<?php

}

}

?>

</div>



<!-- Study Plan --> <br>

<div class="row" id="study_planrow">
    
      
<div class="col-md-12" style="margin-bottom: 10px;"><h5 style="color: black;">Study Plan Documents


</h5></div> 

<?php 
  $study_plans = json_decode($cstudent->study_plan);


if($study_plans != '[]') {
    
foreach($study_plans as $study_plan) {

?>

<div class="col-md-2" id="doc<?php echo str_replace(".", "", $study_plan); ?>">
<h6 class="artigo_nome"><?php echo $study_plan; ?></h6>
<a target="_blank" href="<?php echo '../public/assets_frontend/cstudent/'.$study_plan; ?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
</div>

<?php

}

}

?>

</div>



<!-- Ielts English Proficiency Letter --> <br>


<div class="row" id="ielts_english_proficiency_letterrow">
    
      
<div class="col-md-12" style="margin-bottom: 10px;"><h5 style="color: black;">Ielts English Proficiency Documents

</h5></div> 

<?php 
  $ielts_english_proficiency_letters = json_decode($cstudent->ielts_english_proficiency_letter);


if($ielts_english_proficiency_letters != '[]') {
    
foreach($ielts_english_proficiency_letters as $ielts_english_proficiency_letter) {

?>

<div class="col-md-2" id="doc<?php echo str_replace(".", "", $ielts_english_proficiency_letter); ?>">
<h6 class="artigo_nome"><?php echo $ielts_english_proficiency_letter; ?></h6>
<a target="_blank" href="<?php echo '../public/assets_frontend/cstudent/'.$ielts_english_proficiency_letter; ?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
</div>

<?php

}

}

?>

</div>






    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div>





<!-- Modal -->
<div class="modal fade" id="editmodal<?php echo $cstudent->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Edit Report</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      
    <form enctype="multipart/form-data" method="post" onsubmit="edit_student(this, '<?php echo $cstudent->id; ?>')">

      {{csrf_field()}}

      <span id="editrecordmessage"></span>
      
      <center>
      
      <div class="row">

        <div class="col-md-4">
        <label for="intial_documents_assessment">Intial Documents Assessment</label>
        <input type="checkbox" <?php if($cstudent->intial_documents_assessment == 'on') { echo 'checked'; } ?> class="form-control" name="intial_documents_assessment" id="intial_documents_assessment">
        </div>


        <div class="col-md-4">
        <label for="course_finalaztion">Course Finalaztion</label>
        <input type="checkbox" <?php if($cstudent->course_finalaztion == 'on') { echo 'checked'; } ?> class="form-control" name="course_finalaztion" id="course_finalaztion">
        </div>

        <div class="col-md-4">
        <label for="application_submitted">Application Submitted</label>
        <input type="checkbox" <?php if($cstudent->application_submitted == 'on') { echo 'checked'; } ?> class="form-control" name="application_submitted" id="application_submitted">
        </div>

      </div>
    <br><br>
      <div class="row">

        <div class="col-md-4">
        <label for="got_admission">Got Admission</label>
        <input type="checkbox" <?php if($cstudent->got_admission == 'on') { echo 'checked'; } ?> class="form-control" name="got_admission" id="got_admission">
        </div>


        <div class="col-md-4">
        <label for="visa_applied">Visa Applied</label>
        <input type="checkbox" <?php if($cstudent->visa_applied == 'on') { echo 'checked'; } ?> class="form-control" name="visa_applied" id="visa_applied">
        </div>

        <div class="col-md-4">
        <label for="case_closed">Case Closed</label>
        <input type="checkbox" <?php if($cstudent->case_closed == 'on') { echo 'checked'; } ?> class="form-control" name="case_closed" id="case_closed">
        </div>

      </div>
      
        <input type="hidden" class="form-control" name="recordid" value="<?php echo $cstudent->id; ?>">
        <br><br>
        
        
        <button class="btn btn-success" id="editrecordbtn<?php echo $cstudent->id; ?>" type="submit">Update</button>
        </center>
        
        
      </form>

    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
  </div>
 </div>
</div>



<?php } ?>

</tbody>
</table>
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
<script src="{{asset('plugins/bootstrap-sweetalert/sweet-alert.min.js')}}"></script>
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>

<script>

function edit_student(d , id) {
        
        event.preventDefault();// using this page stop being refreshing 
        document.getElementById('editrecordbtn'+id).innerHTML='<i class="fa fa-spinner fa-spin"></i> Wait Updating...';
	    $('#editrecordbtn'+id).prop('disabled',true);

        var form_data = new FormData(d);

        jQuery.ajax({
            type: 'post',
            url: '../edit-student-report',   
            data: form_data,
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                
            	  document.getElementById('editrecordbtn'+id).innerHTML='Update';
	              $('#editrecordbtn'+id).prop('disabled',false);

                  if (data.message == 'success') {
                  
                    swal("Success!", data.message_text, "success");
                    
                } 
                else {

                    swal("Failure!", data.message_text, "error");
  
                }
            		
            
              
            }
          });
       
       
             }

</script>


<script type="text/javascript">
    $('#datatable').dataTable({
        sort:false,
    });
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
    $(document).on('change','.mark_featured',function(){
        var $loader = $(this).parent().find('.loader');
        $loader.html("<i class='fa fa-refresh fa-spin'></i>");
        var data = { '_token':"{{csrf_token()}}", 'id':$(this).data('id') };
        jQuery.ajax({
            url:'{{route("ajaxPopularUniversity")}}',
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