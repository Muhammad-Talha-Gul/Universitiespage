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


<div class="container" style="color:#464646;">

  <div class="row mt-3">


      <div class="row">
              <div class="col-md-12">
                <div class="app-dash">
                  <!-- <h3><a href="<?php echo e(url('search?page=1&limit=18&scholarship=2&star=5&languages=English,Chinese,chinese,Franch&qualification=1,2,3')); ?>"><u>Search/Apply other Universities</u></a><i class="fa fa-arrow-right"></i></h3> -->
                  <h2>Student Report </h2>
                  <!-- <i class="fa fa-edit" onclick="openCity(event, 'profile')"></i> -->
                  <?php 
    $photo_docs = json_decode($cstudent->photo_doc);
$profilephoto = '';
$i = 1;
if($photo_docs != '[]') {
      
foreach($photo_docs as $photo_doc) {
if($i = 1) {
  $profilephoto = $photo_doc;
} $i++;
}

} else {
  $profilephoto = 'defualt.png';
}
?>
       <br><br>          
<div class="row">

<style>

.card {
  padding: 60px;
  border-radius: 5px;
  display: flex;
  flex-direction: column;
  align-items: center;
  box-shadow: rgba(0, 0, 0, 0.7);
  color: white;
}

.card__name {
  margin-top: 15px;
  font-size: 20px;
  color: white;
  text-align: center;
}

.card__image {
  height: 160px;
  width: 160px;
  border-radius: 50%;
  border: 5px solid #0077c1;
  margin-top: 20px;
  box-shadow: 0 10px 50px #0077c1;
}


.draw-border {
  box-shadow: inset 0 0 0 4px #58cdd1;
  color: #58afd1;
  -webkit-transition: color 0.25s 0.0833333333s;
  transition: color 0.25s 0.0833333333s;
  position: relative;
}

.draw-border::before,
.draw-border::after {
  border: 0 solid transparent;
  box-sizing: border-box;
  content: '';
  pointer-events: none;
  position: absolute;
  width: 0rem;
  height: 0;
  bottom: 0;
  right: 0;
}

.draw-border::before {
  border-bottom-width: 4px;
  border-left-width: 4px;
}

.draw-border::after {
  border-top-width: 4px;
  border-right-width: 4px;
}

.draw-border:hover {
  color: #ffe593;
}

.draw-border:hover::before,
.draw-border:hover::after {
  border-color: #eb196e;
  -webkit-transition: border-color 0s, width 0.25s, height 0.25s;
  transition: border-color 0s, width 0.25s, height 0.25s;
  width: 100%;
  height: 100%;
}

.draw-border:hover::before {
  -webkit-transition-delay: 0s, 0s, 0.25s;
  transition-delay: 0s, 0s, 0.25s;
}

.draw-border:hover::after {
  -webkit-transition-delay: 0s, 0.25s, 0s;
  transition-delay: 0s, 0.25s, 0s;
}

.btn {
  background: none;
  border: none;
  cursor: pointer;
  line-height: 1.5;
  font: 700 1.2rem 'Roboto Slab', sans-serif;
  padding: 0.75em 2em;
  letter-spacing: 0.05rem;
  margin: 1em;
  width: 13rem;
}

.btn:focus {
  outline: 2px dotted #55d7dc;
}


.grid-container {
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-gap: 20px;
  font-size: 1.2em;
}


</style>



<div class="col-md-4">
<div class="card">
    <img src="<?php if($profilephoto == '') { echo 'https://st.depositphotos.com/2101611/3925/v/600/depositphotos_39258143-stock-illustration-businessman-avatar-profile-picture.jpg'; } else { echo config('app.url').'public/assets_frontend/cstudent/'.$profilephoto; } ?>" alt="Person" class="card__image">
      <br><p class="card__name" style="color: #0077c1;font-weight: bold;"><span style="color: #000000;">Name:</span><br><br>  <?php echo e($cstudent->name); ?></p>
      <p class="card__name" style="color: #0077c1;font-weight: bold;"><span style="color: #000000;">Intrested Country:</span><br><br>  <?php echo e($cstudent->intrested_country_doc); ?></p>
    <p class="card__name" style="color: #0077c1;font-weight: bold;"><span style="color: #000000;">Passport Number:</span><br><br>  <?php echo e($cstudent->passport_number); ?></p>   
  </div>
</div>

<div class="col-md-8" style="text-align: center; padding-top:60px;">
  
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
    

    <?php if($cstudent->course_finalaztion == 'on') { echo '.pgb .steptwo .img-circle:after {
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

<?php if($cstudent->application_submitted == 'on') { echo '.pgb .stepthree .img-circle:after {
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

<?php if($cstudent->got_admission == 'on') { echo '.pgb .stepfour .img-circle:after {
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

<?php if($cstudent->visa_applied == 'on') { echo '.pgb .stepfive .img-circle:after {
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

<?php if($cstudent->case_closed == 'on') { echo '.pgb .stepsix .img-circle:after {
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

<div class="row pgb p-0 mt-3">

    <h5 style="margin-bottom: 50px;">This Progress bar Shows the Progress Of Current Application Of a Student The Green Background Shows The Current Status Of Application </h5><br>
    <br><br>
      <div class="col step stepone complete p-0"><p>1</p>
        <span class="img-circle" style="color: white; background: #3a853a;"></span>
        <br><br>
        <center><b>Intial Documents Assessment</b></center>
      </div>

      <div class="col step steptwo complete p-0"><p>2</p>
        <span class="img-circle" style="color: white; background: <?php if($cstudent->course_finalaztion == 'on') { echo '#3a853a'; } else { echo 'orange'; } ?> ;"></span>
        <br><br>
        <center><b>Course Finalaztion</b></center>
      </div>

      <div class="col step stepthree complete p-0"><p>3</p>
        <span class="img-circle" style="color: white; background: <?php if($cstudent->application_submitted == 'on') { echo '#3a853a'; } else { echo 'orange'; } ?> ;"></span>
        <br><br>
        <center><b>Application Submitted</b></center>
      </div>

      <div class="col step stepfour complete p-0"><p>4</p>
        <span class="img-circle" style="color: white; background: <?php if($cstudent->got_admission == 'on') { echo '#3a853a'; } else { echo 'orange'; } ?> ;"></span>
        <br><br>
        <center><b>Got Admission</b></center>
      </div>

      <div class="col step stepfive complete p-0"><p>5</p>
        <span class="img-circle" style="color: white; background: <?php if($cstudent->visa_applied == 'on') { echo '#3a853a'; } else { echo 'orange'; } ?> ;"></span>
        <br><br>
        <center><b>Visa Applied</b></center>
      </div>

      <div class="col step stepsix complete p-0"><p>6</p>
        <span class="img-circle" style="color: white; background: <?php if($cstudent->case_closed == 'on') { echo '#3a853a'; } else { echo 'orange'; } ?> ;"></span>
        <br><br>
        <center><b>Case Closed</b></center>
      </div>

    
</div>
</div>
  



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