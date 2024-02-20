
<?php $__env->startSection('title','Dashboard | University Page'); ?>
<?php $__env->startSection('customStyles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets_frontend/css/jquery-confirm.min.css')); ?>">
    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

  <?php if(Session::has('success')): ?>
    <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
  <?php elseif(Session::has('error')): ?>
    <div class="alert alert-danger"><?php echo e(Session::get('error')); ?></div>
  <?php endif; ?>




   
<br><br><br>
<style>
  @media  screen and (max-width: 770px){
  .trackcontainer{
  padding-top:118px;

  }}
</style>
<div class="trackcontainer">
<div class="container-fluid text-center firstsection">
  <h1>Track application status</h1>

  
</div>
<br>




<div class="container">

   <div class="row">

<div class="col-md-1"></div>
<div class="col-md-10 formcol border" style="padding: 20px; margin-left: 10px;"> 

<form method="GET" action="<?php echo e(route('filterreport')); ?>">
              <?php echo e(csrf_field()); ?>

              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group<?php echo e($errors->has('sname') ? ' has-error' : ''); ?>">
                      <label  class="label1">Enter complete name</label>
                      <input id="sname" type="text" class="form-control inputTrack mb-4" value="<?php if(isset($_GET['sname'])) { echo $_GET['sname']; } ?>" name="sname" required>
                      <?php if($errors->has('sname')): ?>
                          <span class="help-block">
                              <strong><?php echo e($errors->first('sname')); ?></strong>
                          </span>
                      <?php endif; ?>
                  </div>
                </div>

                <div class="col-sm-12">
                  <div class="form-group<?php echo e($errors->has('spassport') ? ' has-error' : ''); ?>">
                    <label class="label1">Enter Passport number</label>
                    <input id="spassport" type="text" class="form-control inputTrack mb-4" value="<?php if(isset($_GET['spassport'])) { echo $_GET['spassport']; } ?>" name="spassport" required>
                    <?php if($errors->has('spassport')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('spassport')); ?></strong>
                        </span>
                    <?php endif; ?>
                  </div>
                </div>

                <div class="col-sm-12">
                  <div class="form-group" style="margin-bottom: 45px; text-align: center;">
                      <button type="submit" style="width: 40%;" class="Filterbtn">Filter</button>
                  </div>
                </div>
              </div>
            </form>


  </div>

<div class="col-md-1"></div>

    
   </div>

</div>
   


    

<br><br><br>







<div class="container" style="color:#464646;">

  <div class="row mt-3">


      <div class="row">
              <div class="col-md-12">
                <div class="app-dash">
                  <!-- <h3><a href="<?php echo e(url('search?page=1&limit=18&scholarship=2&star=5&languages=English,Chinese,chinese,Franch&qualification=1,2,3')); ?>"><u>Search/Apply other Universities</u></a><i class="fa fa-arrow-right"></i></h3> -->
                  <h2>Track application status </h2>
                  <!-- <i class="fa fa-edit" onclick="openCity(event, 'profile')"></i> -->

       <br><br>  
       
     <style>
      .row {
    display: flex;
    flex-wrap: wrap;
    margin-right: -10px;
    margin-left: -10px;
    width: 100%;
}
     </style>  


<div class="row">



<div class="col-md-12" style="text-align: center; padding-top:60px;">
  
  
<?php if(isset($filtersearch)) { ?>

<div id="reponsedata">


<style>
.pgb .step {
    text-align: center;
    position:relative;
    margin-top:10px;
    }
.pgb h2 {
    font-size:1.3rem;
}
.pgb .step p {
    position:absolute;
    height:60px;
    width:100%;
    text-align:center;
    display:block;
    z-index:3;
    color:#fff;
    font-size:160%;
    line-height:55px;
    opacity:.7;
}
.pgb .active.step p {
    opacity:1;
    font-weight:600;
}
.pgb .img-circle {
      display: inline-block;
      width: 60px;
      height: 60px;
      border-radius:50%;
      background-color:#9E9E9E;
    border:4px solid #fff;
    }
.pgb .complete .img-circle {
      background-color:#4CAF50;
    }
.pgb .active .img-circle {
      background-color:#FF9800;
    }

.pgb .stepone .img-circle:after {
        content: "";
        display: block;
        background: #5a5555;
        height: 4px;
        width: 60%;
        position: absolute;
        bottom: 80%;
        left: 70%;
        z-index: -1;
    }
    

    <?php if($cstudent['course_finalaztion'] == 'on') { echo '.pgb .steptwo .img-circle:after {
        content: "";
        display: block;
        background: #5a5555;
        height: 4px;
        width: 60%;
        position: absolute;
        bottom: 80%;
        left: 70%;
        z-index: -1;
    }'; }
    ?>

<?php if($cstudent['application_submitted'] == 'on') { echo '.pgb .stepthree .img-circle:after {
        content: "";
        display: block;
        background: #5a5555;
        height: 4px;
        width: 60%;
        position: absolute;
        bottom: 80%;
        left: 70%;
        z-index: -1;
    }'; }
    ?>

<?php if($cstudent['got_admission'] == 'on') { echo '.pgb .stepfour .img-circle:after {
        content: "";
        display: block;
        background: #5a5555;
        height: 4px;
        width: 60%;
        position: absolute;
        bottom: 80%;
        left: 70%;
        z-index: -1;
    }'; }
    ?>

<?php if($cstudent['visa_applied'] == 'on') { echo '.pgb .stepfive .img-circle:after {
        content: "";
        display: block;
        background: #5a5555;
        height: 4px;
        width: 60%;
        position: absolute;
        bottom: 80%;
        left: 70%;
        z-index: -1;
    }'; }
    ?>

<?php if($cstudent['case_closed'] == 'on') { echo '.pgb .stepsix .img-circle:after {
        content: "";
        display: block;
        background: #5a5555;
        height: 4px;
        width: 60%;
        position: absolute;
        bottom: 80%;
        left: 70%;
        z-index: -1;
    }'; }
    ?>


.pgb .step.complete .img-circle:after {
        background: #0564AF;
    }

    .pgb .step:last-of-type .img-circle:after, .pgb .step:first-of-type .img-circle:before{
        display: none;
    }
</style>

<div class="row">
    
    <div class="col-md-4" style="font-size: 18px; text-align: center; text-transform: capitalize;">
        <label style="font-weight: bold; color: #0564af;">Name:</label><br>
        <p><?php if(isset($_GET['sname'])) { echo $_GET['sname']; } ?></p>
    </div> 
    
    <div class="col-md-4" style="font-size: 18px; text-align: center; text-transform: capitalize;">
        <label style="font-weight: bold; color: #0564af;">Passport #:</label><br>
        <p><?php if(isset($_GET['spassport'])) { echo $_GET['spassport']; } ?></p>
    </div> 
    
    <div class="col-md-4" style="font-size: 18px; text-align: center; text-transform: capitalize;">
        <label style="font-weight: bold; color: #0564af;">Intrested Country:</label><br>
        <p><?php if(isset($_GET['sname'])) { echo $cstudent['interestedCountryId']; } ?></p>
    </div> 
    
    
</div> <br><br><br>

<div class="row pgb p-0 mt-3">


    <h5 class="col-md-12" style="margin-bottom: 40px; font-size: 19px;">This progress bar shows the progress of Your current application. The green background shows the current status of your application.</h5><br>
    
      <div class="col step stepone complete p-0"><p>1</p>
        <span class="img-circle" style="color: white; background: #3a853a;"></span>
        <br><br>
        <center><b>Intial Documents Assessment</b></center>
      </div>

      <div class="col step steptwo complete p-0"><p>2</p>
        <span class="img-circle" style="color: white; background: <?php if($cstudent['course_finalaztion'] == 'on') { echo '#3a853a'; } else { echo 'orange'; } ?> ;"></span>
        <br><br>
        <center><b>Course Finalaztion</b></center>
      </div>

      <div class="col step stepthree complete p-0"><p>3</p>
        <span class="img-circle" style="color: white; background: <?php if($cstudent['application_submitted'] == 'on') { echo '#3a853a'; } else { echo 'orange'; } ?> ;"></span>
        <br><br>
        <center><b>Application Submitted</b></center>
      </div>

      <div class="col step stepfour complete p-0"><p>4</p>
        <span class="img-circle" style="color: white; background: <?php if($cstudent['got_admission'] == 'on') { echo '#3a853a'; } else { echo 'orange'; } ?> ;"></span>
        <br><br>
        <center><b>Got Admission</b></center>
      </div>

      <div class="col step stepfive complete p-0"><p>5</p>
        <span class="img-circle" style="color: white; background: <?php if($cstudent['visa_applied'] == 'on') { echo '#3a853a'; } else { echo 'orange'; } ?> ;"></span>
        <br><br>
        <center><b>Visa Applied</b></center>
      </div>

      <div class="col step stepsix complete p-0"><p>6</p>
        <span class="img-circle" style="color: white; background: <?php if($cstudent['case_closed'] == 'on') { echo '#3a853a'; } else { echo 'orange'; } ?> ;"></span>
        <br><br>
        <center><b>Case Closed</b></center>
      </div>

    
</div>
</div>


</div>

<?php } ?>


<?php if(isset($nodataavailble)) { ?>

  <h5 style="margin-bottom: 50px;">No Data Can Be Found On Given Information</h5><br>

<?php } ?>


</div>
<br><br>  <br><br> 


              </div>
            </div>
          </section>

        </main>
      </div>

   
    </div>

  </div>

</div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('customScripts'); ?>


 
  <script>
    // window.location.hash = tab2
    var hash = $(location).attr('hash');
    <?php if(Session::has('id')): ?>
      hash = '#'+'<?php echo e(Session::get("id")); ?>';
    <?php endif; ?>
    if(hash!==''){
      $('.tabcontent').each(function(){
        $(this).hide();
        $(this).removeClass('active');
      });
      $(hash).show();
      window.history.pushState({path:'<?php echo e(request()->url()); ?>'+hash},'','<?php echo e(request()->url()); ?>'+hash);
    }
    <?php echo e(Session::forget("id")); ?>

    function openCity(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
      window.history.pushState({path:'<?php echo e(request()->url()); ?>'+'#'+cityName},'','<?php echo e(request()->url()); ?>'+'#'+cityName);
    }
    $(document).ready(function(){
      $('.app-uni').hover(function(){
          $(this).parent().next().find('.hover-uni').show();
        }, function(){
          $('.hover-uni').hide();
      });
      $(document).on('mouseenter', '.hover-uni',function(e){
        $(this).show();
      });
      $(document).on('mouseleave', '.hover-uni',function(e){
        $(this).hide();
      });
    });
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>