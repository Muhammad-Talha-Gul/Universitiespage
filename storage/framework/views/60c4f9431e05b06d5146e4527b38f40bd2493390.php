<?php ini_set('memory_limit', '256M'); ?>  



<br><br><br>

<div class="container-fluid text-center firstsection">
  <h1><?php echo ($meta['title'])??''; ?></h1>
  <p><?php echo ($meta['text'])??''; ?></p>
  <div class="row">

    <div class="col-lg-4"></div>
    <div class="col-lg-4">

             <form id="search-form" class="mb-1" action="<?php echo e(url('search')); ?>" method="GET">
                  <div class="input-group">
                     <input type="text" name="search" class="form-control uni-search searchform2" placeholder="Search..." autocomplete="Off">
                     
                     <button class="Searchbtn2"><i class="fa fa-search"></i></button>
                     
                  </div>
               </form>
               <div style="position: absolute;" class="is-dropdown w-100 u-maxw-680px bg-white u-boxShadow-light d-none search-uni scroll2"></div>


                                          <?php $__env->startPush('scripts'); ?>
            <script>
               $(document).ready(function(){
                  $(document).on('keyup', '.uni-search', function(){
                     var val = $(this).val();
                     var baseUrl = '<?php echo e(url('/')); ?>';
                     if(val!==''){
                        $.ajax({
                           url:'<?php echo e(url("get-university-list")); ?>',
                           type: 'POST',
                           dataType: 'json',
                           data: {'search':val, _token:'<?php echo e(csrf_token()); ?>'},
                           success: function (uni){
                             var html = ``;
                             for (var i = uni.length - 1; i >= 0; i--) {
                                html +=`<a class="d-block c-highlightLink list-uni" href="`+baseUrl+'/university/'+uni[i]['slug']+`">`+uni[i]['name']+`</a>`;    
                             }
                             $('.search-uni').html(html); 
                             $('.search-uni').removeClass('d-none');
                             if(uni.length == 0){
                                $('.search-uni').addClass('d-none');
                             }
                           }
                        })
                     }else{
                       $('.search-uni').html('');
                       $('.search-uni').addClass('d-none');
                     }
                  });
               });
            </script>
         <?php $__env->stopPush(); ?>

            </div>   

    <div class="col-lg-4"></div>
 
    </div>
</div>
<br>





<div class="container-fluid searchsectionbg">
    <div class="container">

<div class="row">
    <div class="col-lg-12 textcol1" style="text-align: center;">
        <h4>Search By Country</h4>
    </div>

    
</div>

    </div>
</div>













   <style>
     .sub-btn{
      color: white !important;
      border:none;
     }
     .sub-btn:hover{
      color: #c52228 !important;
      border:solid 1px #c52228;
     }
   </style>




<div class="container">
  
<h2 class="h2 mb-3 mt-3" style="padding:20px 0px;" align="center">Search By Country</h2>

<div class="panel panel-default" style="margin-top: 30px;">
               <div class="panel-heading" style="margin-bottom: 0px;padding: 6px 5px;"> <span style="padding-left: 7px;color:white;font-size:17px;"></span></div>
               <div class="panel-body" style="margin-top: 0px;">  
                  
                
                    <style>
  
  ul.column-list {
    column-count: 3;
    padding: 0;
}

ol, ul, dl {
    margin-top: 0;
    margin-bottom: 1rem;
}

ul {
    display: block;
    list-style-type: disc;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    padding-inline-start: 40px;
}

ul.column-list li {
    overflow: hidden;
    page-break-inside: avoid;
    -webkit-column-break-inside: avoid;
    break-inside: avoid-column;
    margin-bottom: 15px;
    background: #F6F6F6;
    color: #0275d8;
    font-weight: bold;
}
li {
    display: list-item;
    text-align: -webkit-match-parent;
}

ul {
    list-style-type: disc;
}

ul.column-list.countries img {
    max-width: 10rem;
}

ul.column-list li img {
    max-width: 3rem;
    margin-right: 1rem;
}
@media (max-width:990px) {
    ul.column-list.countries img {
    max-width: 5rem;
    margin-right: 1rem;
    }
}

@media (max-width:990px) {
    ul.column-list.countries img {
    max-width: 8rem;
    margin-right: 1rem;
    }
}

@media (max-width:680px) {
    ul.column-list.countries img {
    max-width: 6rem;
    margin-right: 1rem;
    }
}

@media (max-width:407px) {
    ul.column-list.countries img {
    max-width: 5rem;
    margin-right: 1rem;
    }
}

</style>


                <ul class="column-list countries">

                        <?php $__currentLoopData = getSelectedCountries()->sortBy('id')->chunk(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $country_chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                           <?php if($key < 5): ?>
      </tr>                    
                              <?php $__currentLoopData = $country_chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 
                              <li itemscope="" itemtype="http://schema.org/Country"> 
    <a href="<?php echo e(url('search?type=university&location='.$c->country)); ?>" itemprop="<?php echo e(url('search?type=university&location='.$c->country)); ?>">

     <img src="<?php echo e($c->image); ?>" alt="<?php echo e($c->country); ?>" data-lazy-src="<?php echo e($c->image); ?>" class="lazyloaded" data-was-processed="true">
      <noscript><img src="<?php echo e($c->image); ?>" alt="<?php echo e($c->country); ?>"></noscript>
     
    <span itemprop="name"><?php echo e($c->country); ?> (<?php echo e($c->code); ?>)</span> 
         
      </a>
  </li>

                                 
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tr>                       
                           <?php else: ?>
    <tr v-if="view_all">      
                              <?php $__currentLoopData = $country_chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <li itemscope="" itemtype="http://schema.org/Country"> 
    <a href="<?php echo e(url('search?type=university&location='.$c->country)); ?>" itemprop="<?php echo e(url('search?type=university&location='.$c->country)); ?>">

     <img src="<?php echo e($c->image); ?>" alt="<?php echo e($c->country); ?>" data-lazy-src="<?php echo e($c->image); ?>" class="lazyloaded" data-was-processed="true">
      <noscript><img src="<?php echo e($c->image); ?>" alt="<?php echo e($c->country); ?>"></noscript>
     
    <span itemprop="name"><?php echo e($c->country); ?> (<?php echo e($c->code); ?>)</span> 
         
      </a>
  </li>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tr>                      
                           <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     
                      </ul>

               </div>
            </div>


         

            <?php if(getSelectedCountries()->count() >15): ?>
               <div align="center">
               <a class="btn btn-primary sub-btn" @click="viewAll" v-if="view_all == false">View All</a>
               </div>
            <?php endif; ?>
      

</div>





<br><br>
<div class="container-fluid text-center firstsection2">
    <h1>Search By Course</h1>
    </div>

    <br><br>



<div class="container-fluid Browsesection" style="background: white;">
        <div class="container">
          
        <div class="container">
            <div class="accordion" id="accordionExample">

               <?php $count_show_collapse = 1; ?>

               <?php $__currentLoopData = subjects(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(count($sub->courses)>0): ?>


                <div class="card">
                    <div class="card-header1" data-toggle="collapse" data-target="#collapseOne<?php echo e($sub->id); ?>" aria-expanded="true">     
                        <span class="title"><?php echo e($sub->name); ?></span>
                        <span class="accicon"><i class="fa fa-caret-down"></i></span>
                    </div>
                    <div id="collapseOne<?php echo e($sub->id); ?>" class="collapse <?php if($count_show_collapse == 1) { echo 'show'; } $count_show_collapse++; ?>" data-parent="#accordionExample">
                        <div class="card-body Selectone" style="border: none;">
        
                            <div class="form1">

                              <?php $__currentLoopData = $sub->courses->where('active',1)->where('display',1)->take(10)->chunk(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                    <div class="row mb-2">

                                       <?php $__currentLoopData = $course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       
                                        <div class="col-lg-6 mb-2 input1" style="margin-top: 20px;">

                                          <a style="padding: 10px;
    display: block;
    text-align: left;
    height: auto;
    color: #A5A5A5;
    font-family: Poppins;
    font-size: 18px;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    text-decoration: none;"  href="<?php echo e(url('search?type=university&search='.$c->name)); ?>" target="_blank">
                                          <?php echo e($c->name); ?> (<?php echo e($c->university->name); ?>)
                                          </a>

                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </div>
                                    

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                                <center><p><a href="<?php echo e(url('search?page=1&limit=18&type=course&subject='.$sub->id)); ?>">View More</a></p></center>

                            </div>
        
                        </div>
                    </div>
                </div>
               


            <?php endif; ?>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



               



                                </div>





            </div>
        </div>
        </div>



</div>

<br><br><br>


<?php $__env->startPush('scripts'); ?>
<script>
   var content234 = new Vue({
      el: '#search-by-loc',
      data: {
         view_all:false
      },
      methods: {
         viewAll () {
            this.view_all = true
         }
      }
   })
</script>
<?php $__env->stopPush(); ?>
