

<br><br><br>

<div class="container-fluid text-center firstsection">
  <h1>Find courses</h1>
  <p>Here you can search over 10,000 courses by course type or Subject wise.</p>
  <div class="row">
    </div>
</div>


<br>



<div class="container-fluid searchsectionbg">
    <div class="container">

<div class="row">
    <div class="col-lg-12 textcol1" style="text-align: center;">
        <h4>Courses List</h4>
    </div>
</div>

    </div>
</div>



<div class="container-fluid Browsesection">
        <div class="container">
          
        <div class="container">
            <div class="accordion" id="accordionExample">




                <div class="row">

                  

                	<?php if(isset($meta['type'])): ?>


                    <div class="col-lg-6">

                    	                                        	<?php
          		$q_count = count(qualification());
          		$qualification = qualification();
          	?>
          	<?php $__currentLoopData = $qualification->chunk(round($q_count/1)); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$quali): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="card">
                            <div class="card-header1" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true">     
                                <span class="title"><?php echo e(($meta['title1'])??''); ?></span>
                                <span class="accicon"><i class="fa fa-caret-down"></i></span>
                            </div>
                            <div id="collapseOne" class="collapse show" data-parent="">
                                <div class="card-body Selectone" style="border: none;">
                
                                    <div class="linksection1" style="margin-top: 15px;">
        
                                        <ul>

                                        	<?php $__currentLoopData = $quali; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $q): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                            <li style="height: 100% !important;"><a target="_blank" href="<?php echo e(url('search?type=course&qualification='.$q->id)); ?>"><i class="fa fa-lg fa-fw <?php echo e((json_decode($q->attributes)->font_awsome)??''); ?>"></i> <?php echo e($q->title); ?></a></li>


                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                        </ul>
                                        
                                        
                                        <center><p><a href="#">View More</a></p></center>
        
                                    </div>
                
                                </div>
                            </div>
                        </div>

                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>

                    
                     <?php endif; ?>








          <?php if(isset($meta['subject'])): ?>


                    <div class="col-lg-6">

          	<?php
          		$s_count = count(subjects());
          		$subjects = subjects();
          	?>
          	<?php $__currentLoopData = $subjects->chunk(round($s_count/1)); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="card">
                            <div class="card-header1" data-toggle="collapse" data-target="#collapsetwo" aria-expanded="true">     
                                <span class="title"><?php echo e(($meta['title2'])??''); ?></span>
                                <span class="accicon"><i class="fa fa-caret-down"></i></span>
                            </div>
                            <div id="collapsetwo" class="collapse show" data-parent="">
                                <div class="card-body Selectone" style="border: none;">
                
                                    <div class="linksection1" style="margin-top: 15px;">
        
                                        <ul>

                                        	<?php $__currentLoopData = $subject; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                            <li style="height: 100% !important;"><a target="_blank" href="<?php echo e(url('search?type=course&subject='.$sub->id)); ?>"><?php echo e(($sub->name)??''); ?></a>

                                             <?php if($sub->guide !== null): ?>
	                    <a href="<?php echo e(url(('guides/'.$sub->guide->slug)??'#.')); ?>" target="_blank">
		                    <i style="width: auto; font-size: 15px;" class="fa fa-fw fa-lg fa-leanpub fa-pub">See Guide</i>
	                    </a>
	                    <?php endif; ?>

	                    </li>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                        </ul>
                                        
                                        
                                        <center><p><a href="#">View More</a></p></center>
        
                                    </div>
                
                                </div>
                            </div>
                        </div>

                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>

                    
                     <?php endif; ?>


                </div>
               




               





            </div>
        </div>
        </div>
        </div>


