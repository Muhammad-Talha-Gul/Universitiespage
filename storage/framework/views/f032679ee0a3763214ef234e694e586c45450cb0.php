<?php if(isset($meta['style'])): ?>
<?php if($meta['style'] == 'style1'): ?>





<!-- /* ..................Browse Courses Section Start............. */ -->


<style type="text/css">
    div[aria-expanded="true"] {
        background: #2A3857;
        color: white;
    }

    div[aria-expanded="false"] {
        background: white;
        color: black;
    }
</style>


<div class=" Browsesection">
    <div class="container">

        <div class="">
            <div class="accordion" id="accordionExample">



                <?php if(!empty($meta['opt'])): ?>

                <?php $count_accordion_browse_home = 0; ?>

                <?php $__currentLoopData = $meta['opt']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php $count_accordion_browse_home++; ?>

                <div class="card dropdown-search-main">
                    <div class="card-header1" data-toggle="collapse" data-target="#collapse<?php echo $count_accordion_browse_home; ?>" aria-expanded="<?php if ($count_accordion_browse_home == 1) {
                                                                                                                                                            echo 'true';
                                                                                                                                                        } else {
                                                                                                                                                            echo 'false';
                                                                                                                                                        } ?>">
                        <?php echo ($ser['title'])??''; ?>


                        <span class="accicon">
                            <i class="fa fa-caret-down"></i></span>
                    </div>
                    <div id="collapse<?php echo $count_accordion_browse_home; ?>" class="collapse <?php if ($count_accordion_browse_home == 1) {
                                                                                                        echo 'show';
                                                                                                    } ?>" data-parent="#accordionExample">
                        <div class="card-body Selectone" style="border: none; margin-top: 10px;">
                            <p class="card-inner-heading"><?php echo ($ser['text'])??''; ?></p>
                            <ul>
                                <?php if(isset($ser['type'])): ?>
                                <?php if($ser['type'] == 'programs'): ?>
                                <?php if(count(getSearchList($ser['type']))>0): ?>
                                <?php $__currentLoopData = getSearchList($ser['type']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                <a href="<?php echo e(url('search?type=course&qualification='.$val->id)); ?>">
                                        <span><?php echo e($val->title); ?></span>
                                    </a>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                <?php elseif($ser['type'] == 'university'): ?>
                                <?php if(count(getSearchList($ser['type']))>0): ?>
                                <?php $__currentLoopData = getSearchList($ser['type']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="<?php echo e(url('university/'.$val->slug)); ?>">
                                        <span> <?php echo e($val->name); ?> </span>
                                    </a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                <?php else: ?>
                                <?php if(count(getSearchList($ser['type']))>0): ?>
                                <?php $__currentLoopData = getSearchList($ser['type']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="<?php echo e(url('search')); ?>">
                                        <span> <?php echo e($val->title); ?> </span>
                                    </a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                <?php endif; ?>
                                <?php endif; ?>
                            </ul>

                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<!-- /* ..................Browse Courses Section End............. */ -->





<?php elseif($meta['style'] == 'style2'): ?>


<section class="courses-banner">
    <div class="container">
        <div class="firstsectionimgbg">
        <!-- <div class="firstsectionimgbg" style="background-image:url(<?php echo e(url((fix($meta['bg_image']))??iph())); ?>);background-position: center;background-size: cover;background-repeat: no-repeat;"> -->
            <div class="overlaynew1 search-banner-main">
                <div class="onimgtext">
                    <p><?php echo ($meta['title'])??''; ?></p>
                </div>
            </div>
        </div>
    </div>
</section>




<div class="py-5 <?php echo e(($meta['class'])??''); ?>" id="student_main_search">
    <div class="container-fluid">
        <div class="bg-light pt-3 pt-lg-5" id="student_main_search">
            <div class="row">
                <!-- <section class="col-sm-12 d-lg-none text-left ">
                    <button class="btn btn-primary filterBtn">
                        <i class="fa fa-filter"></i> Filter
                    </button>
                </section> -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
                    <div class="search-filter">
                        <form action="javascript:void(0);" id="DesktopFilter" class="card u-boxShadow-light l-labelList p-3 mb-3">
                            <div class="row">
                                <div class="col-md-12 fieldset ">
                                    <label class="h6 font-weight-bold">Search</label>
                                    <input type="text" v-model="search" class="custom-input inputtype w-100 main_search">
                                </div>
                                <div class="col-md-12 fieldset mt-3">
                                    <label class="h6 font-weight-bold ">Select Country</label>
                                    <select name="type" class="custom-select w-100 mb-3 inputtype type-select search-select" style="border: 1px solid #ccc; border-radius: 0.25rem; " v-model="location" @change="countrySelected()">
                                        <option value="" selected>Select Country</option>
                                        <?php $__currentLoopData = getSelectedCountries(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $country_obj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($country_obj->country); ?>"><?php echo e($country_obj->country); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="col-md-12 fieldset">
                                    <label class="h6 font-weight-bold">Search <span style="font-size: 11px;font-weight: 500;color: #464646;letter-spacing: 0.5px;">(Course/University/Guide/Articals)</span></label>
                                    <select name="type" class="custom-select w-100 mb-3 inputtype type-select search-select" style=" border: 1px solid #ccc; border-radius: 0.25rem;">
                                        <option value="university" :selected="type == 'university'">University</option>
                                        <option value="course" :selected="type == 'course'">Course</option>
                                        <!-- <option value="guide" :selected="type == 'guide'">Guide</option>
                                    <option value="articles" :selected="type == 'articles'">Articles</option> -->
                                    </select>
                                </div>

                            </div>





                            <div class="fieldset dsp-0 show-uni" style="margin-top:20px;">
                                <label class="h6 font-weight-bold">Universities</label>
                                <select name="university" class="custom-select select2 w-100 mb-3 university-select search-select">
                                    <option selected="" value="0">All Universities</option>
                                    <?php $__currentLoopData = getAllUniversity(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uni): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($uni->id); ?>" :selected="university == '<?php echo e($uni->id); ?>'"><?php echo e($uni->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="fieldset dsp-0 show-sub" style="margin-top:20px;">
                                <label class="h6 font-weight-bold">Subject</label>
                                <select name="country" class="custom-select select2 w-100 mb-3 subject-select search-select">
                                    <option selected="" value="0">All Subjects</option>
                                    <?php $__currentLoopData = pluckSubjects(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>" :selected="subject == '<?php echo e($key); ?>'*1"><?php echo e($sub); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>


                            <div class="fieldset dsp-0 show-gui" style="margin-top:20px;">
                                <label class="h6 font-weight-bold">Guide</label>
                                <div class="half_width">
                                    <label>
                                        <input type="checkbox" name="guide[]" value="university" <?php if(isset($_GET['guide'])): ?> <?php if(in_array('university', explode(',',$_GET['guide']))): ?> checked="" <?php endif; ?> <?php else: ?> checked="" <?php endif; ?> @click="filterC($event, 'guide')">
                                        <span>University </span>
                                    </label>
                                </div>
                                <div class="half_width">
                                    <label>
                                        <input type="checkbox" name="guide[]" value="subject" <?php if(isset($_GET['guide'])): ?> <?php if(in_array('subject', explode(',',$_GET['guide']))): ?> checked="" <?php endif; ?> <?php else: ?> checked="" <?php endif; ?> @click="filterC($event, 'guide')">
                                        <span>Subjects </span>
                                    </label>
                                </div>
                            </div>

                            <div class="see-more">
                                <div class="fieldset dsp-0 show-dur" style="margin-top:20px;">
                                    <label class="h6 font-weight-bold">Duration</label>
                                    <label class="search-label input-50">Min Year
                                        <select name="minDur" class="custom-select duration-select w-100 mb-3">
                                            <option value="0">Any</option>
                                            <option v-for="i in 11" :selected="`<?php echo e(($_GET['minDur'])??0); ?>`== i" :value="i" v-text="i"></option>
                                        </select></label>
                                    <label class="search-label input-50">Max Year
                                        <select name="maxDur" class="custom-select duration-select w-100 mb-3">
                                            <option value="0">Any</option>
                                            <option v-for="i in 11" :selected="`<?php echo e(($_GET['maxDur'])??0); ?>`== i" :value="i" v-text="i"></option>
                                        </select>
                                    </label>
                                </div>

                                <div class="fieldset dsp-0 show-fee" style="margin-top:20px;">
                                    <label class="h6 font-weight-bold">Tution Fee</label>
                                    <label class="search-label input-50">Min Fee
                                        <input type="number" class="custom-input w-100" min="0" @keyup="minFee= $event.target.value" name="minFee" value="<?php echo e(($_GET['minFee'])??0); ?>">
                                    </label>
                                    <label class="search-label input-50" style="position: relative;">Max Fee
                                        <input type="number" class="custom-input w-100" max="0" @keyup="maxFee= $event.target.value" name="maxFee" value="<?php echo e(($_GET['maxFee'])??0); ?>">
                                        <button type="button" class="btn btn-primary" @click="fetchData(page=1);" style="position: absolute;right: 0px;width: 50px;font-size: 11px;padding: 0px;height: 37px;border-radius: 0px;border: none;top: 16px;border-right: solid 1px #dad7d7 !important;border-top: solid 1px #dad7d7 !important;border-bottom: solid 1px #dad7d7!important;">Search</button>
                                    </label>
                                    <div style="clear:both;">
                                    </div>
                                </div>


                                <div class="fieldset dsp-0 show-sch" style="margin-top:20px;">
                                    <label class="h6 font-weight-bold">Scholarship</label>
                                    <label class="custom-radio"> With/With Out Scholarship
                                        <input type="radio" name="scholarship" value="2" @click="filterC($event, 'scholarship')" :checked="scholarship == 2">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="custom-radio"> With Scholarship
                                        <input type="radio" name="scholarship" value="1" @click="filterC($event, 'scholarship')" :checked="scholarship == 1">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="custom-radio"> With Out Scholarship
                                        <input type="radio" name="scholarship" value="0" @click="filterC($event, 'scholarship')" :checked="scholarship == 0">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>


                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                


                                <div class="fieldset dsp-0 show-qua" style="margin-top:20px;">
                                    <label class="h6 font-weight-bold">Qualification</label>
                                    <?php $__currentLoopData = qualification(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qual): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="half_width">
                                        <label>
                                            <input type="checkbox" name="qualification[]" value="<?php echo e($qual->id); ?>" <?php if(isset($_GET['qualification'])): ?> <?php if(in_array($qual->id, explode(',',$_GET['qualification']))): ?> checked="" <?php endif; ?> <?php else: ?> checked="" <?php endif; ?> @click="filterQual($event)">
                                            <span><?php echo e($qual->title); ?> </span>
                                        </label>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>

                                <div class="fieldset dsp-0 show-rat" style="margin-top:20px;">
                                    <label class="h6 font-weight-bold">Rating</label>
                                    <div class="stars">
                                        <i class="fa fa-star review-star"></i>
                                        <i class="fa fa-star review-star"></i>
                                        <i class="fa fa-star review-star"></i>
                                        <i class="fa fa-star review-star"></i>
                                        <i class="fa fa-star review-star"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="see-more-btn d-lg-none" v-text="(allFilters*1==1)?'See Less':'See More'"></p>
                        </form>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9">
                    <div class="search-tabs">
                        <div :class="(type == 'university')?'tabs-links active':'tabs-links'" id="university_hide_this" style="display: none;" @click="changeTypeTo($event, 'university')">University <span class="search-count" v-if="universities && universities.data && universities.data.length>0" v-text="universities.total"></span></div>
                        <div :class="(type == 'course')?'tabs-links active':'tabs-links'" id="course_hide_this" style="display: none;" @click="changeTypeTo($event, 'course')">Course <span class="search-count" v-if="courses && courses.data && courses.data.length>0" v-text="courses.total"></span></div>
                        <div :class="(type == 'guide')?'tabs-links active':'tabs-links'" id="guide_hide_this" style="display: none;" @click="changeTypeTo($event, 'guide')">Guide <span class="search-count" v-if="guides && guides.data && guides.data.length>0" v-text="guides.total"></span></div>
                        <div :class="(type == 'articles')?'tabs-links active':'tabs-links'" id="articles_hide_this" style="display: none;" @click="changeTypeTo($event, 'articles')">Articles <span class="search-count" v-if="articles && articles.data && articles.data.length>0" v-text="articles.total"></span></div>
                    </div>
                    <div class="uni_lists type_uni">
                        <h5 class="showing-now">Showing <span v-if="(universities.data && universities.data.length>0)"><span v-if="limit<universities.data.length" v-text="limit"></span><span v-else>{{universities.data.length}}</span> out of {{universities.data.length}}</span><span v-else>0</span></h5>
                        <section class="mb-3">
                            <div class="row " v-if="(universities.data && universities.data.length>0)">
                                <div class=" col-xs-12 col-sm-6 col-md-6 col-lg-3 search-column  universities-card-column" v-for="uni in universities.data">
                                    <article class="row  no-gutters align-items-center flex-nowrap border-bottom border-top u-small95 pt-4 course-articles" onerror="if(this.src!='<?php echo e(url(iph())); ?>'){this.src='<?php echo e(url(iph())); ?>'}">
                                        <div class="col search-grad" style="text-align: center;">
                                            <a :href="baseUrl+'/university/'+uni.slug" target="_blank" class="search-universities-card-link">
                                                <img class="img-fluid universities-card-image" :src="''+baseUrl+'/'+optImage(uni.logo,'thumbs')+''">
                                            </a>
                                            <br>
                                            <h6 class="search-page-heading"><a :href="baseUrl+'/university/'+uni.slug" v-text="uni.name" target="_blank" class="search-universities-card-link"></a>
                                                <div class="ml-2" style="display: inline;font-size: 13px;position: relative;top: -1px;">({{uni.city}}, {{uni.country}})</div>
                                            </h6>
                                            <div class="media mb-3">
                                                <div class="media-body mx-2">
                                                    <div class="text-muted small">
                                                        <div><i class="fa fa-calendar"></i> {{(uni.intake!==null)?uni.intake:''}}</div>
                                                        <!-- <div><i class="fa fa-book"></i> {{uni.course_count}} Courses</div> -->
                                                        <br>
                                                        <a :href="baseUrl+'/university/'+uni.slug" class="col-md-12 btn btn-success btn-sm search-card-link" style="margin-top: 5px;"><i class="fa fa-book"></i> {{uni.course_count}} Courses</a>
                                                        <button class="col-md-12 btn btn-success btn-sm search-card-link" style="margin-top: 5px;" onclick="send_emailcontat(this,'university')">Request information <i style="display: none;">'{{uni.id}}'</i></button>
                                                        <button class="col-md-12 btn btn-success btn-sm search-card-link" style="margin-top: 5px;" onclick="consulation()">Free Consultation</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <p class="course_lists" v-else style="text-align: center;margin-top: 35px;font-size: 20px;color: gray;"><span style="font-weight: bold;font-size: 22px;">Sorry!</span><br> No University Found.</p>


                        </section>

                        <section class="container o-flex-center">
                            <nav aria-label="Page navigation" v-if="universities.last_page > 1">
                                <ul class="pagination small">
                                    <li v-if="universities.current_page != 1" class="page-item">
                                        <a style="cursor:pointer;" class="page-link" @click="fetchData(page--)">
                                            <i class="fa fa-chevron-left"></i>
                                        </a>
                                    </li>
                                    <div style="display:flex;" v-if="universities.current_page <= 3 || universities.last_page <= 5">
                                        <div v-if="universities.last_page <= 5 " style="display:flex;">
                                            <li v-for="i in universities.last_page" :class="(universities.current_page == i) ? 'active page-item' : 'page-item'">
                                                <a style="cursor:pointer;" class="page-link" @click="fetchData(page=i)" v-text="i"></a>
                                            </li>
                                        </div>
                                        <div v-else style="display:flex;">
                                            <li v-for="i in 5" :class="(universities.current_page == i) ? 'active page-item' : 'page-item'">
                                                <a style="cursor:pointer;" class="page-link" @click="fetchData(page=i)" v-text="i"></a>
                                            </li>
                                            <li class="page-item">
                                                <a style="cursor:pointer;" class="page-link">...</a>
                                            </li>
                                            <li :class="(universities.current_page == universities.last_page)">
                                                <a style="cursor:pointer;" class="page-link" @click="fetchData(page=universities.last_page)" v-text="universities.last_page"></a>
                                            </li>
                                        </div>
                                    </div>
                                    <div style="display:flex;" v-else-if="universities.current_page == universities.last_page || universities.current_page == universities.last_page-1">
                                        <li class="page-item">
                                            <a style="cursor:pointer;" class="page-link" @click="fetchData(page=1)" v-text="'1'"></a>
                                        </li>
                                        <li class="page-item">
                                            <a style="cursor:pointer;" class="page-link">...</a>
                                        </li>
                                        <li v-for="i in [universities.last_page-4, universities.last_page-3, universities.last_page-2, universities.last_page-1, universities.last_page]" :class="(universities.current_page == i) ? 'active page-item' : 'page-item'">
                                            <a style="cursor:pointer;" class="page-link" @click="fetchData(page=i)" v-text="i"></a>
                                        </li>
                                    </div>
                                    <div style="display:flex;" v-else>
                                        <li class="page-item">
                                            <a style="cursor:pointer;" class="page-link" @click="fetchData(page=1)" v-text="'1'"></a>
                                        </li>
                                        <li class="page-item">
                                            <a style="cursor:pointer;" class="page-link">...</a>
                                        </li>
                                        <li v-for="i in [universities.current_page-2, universities.current_page-1, universities.current_page, universities.current_page+1, universities.current_page+2]" :class="(universities.current_page == i) ? 'active page-item' : 'page-item'">
                                            <a style="cursor:pointer;" class="page-link" @click="fetchData(page=i)" v-text="i"></a>
                                        </li>
                                        <li class="page-item">
                                            <a style="cursor:pointer;" class="page-link">...</a>
                                        </li>
                                        <li class="page-item">
                                            <a style="cursor:pointer;" class="page-link" @click="fetchData(page=universities.last_page)" v-text="universities.last_page"></a>
                                        </li>
                                    </div>
                                    <li v-if="universities.current_page != universities.last_page" class="page-item">
                                        <a style="cursor:pointer;" class="page-link" @click="fetchData(page++)">
                                            <i class="fa fa-chevron-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </section>
                    </div>
                    <div class="uni_lists type_cou">
                        <h5 class="showing-now">Showing <span v-if="(courses && courses.total>0)"><span v-if="limit<courses.total" v-text="limit"></span><span v-else>{{courses.total}}</span> out of {{courses.total}}</span><span v-else>0</span></h5>
                        <section class="mb-3">
                            <div class="row" v-if="courses.data && courses.data.length>0">
                                <div class="col-md-3 col-sm-12 col-xs-12" v-for="course in courses.data">
                                    <article class="row no-gutters align-items-center flex-nowrap border-bottom border-top u-small95 pt-4 course-articles" style="border-bottom: 0px !important; border-radius:5px;">
                                        <div class="col search-grad" style="text-align: center;">
                                            <a :href="baseUrl+'/courses/'+course.id" target="_blank">
                                                <img class="img-fluid universities-card-image" :src="(course.university)?''+baseUrl+'/'+optImage(course.university.logo,'thumbs')+'':''">
                                            </a>
                                            <h6><a :href="baseUrl+'/courses/'+course.id" v-text="course.name" target="_blank"></a>
                                                <div class="ml-2" style="display: inline;font-size: 13px;position: relative;top: -1px;" v-if="course.qualification_name">({{course.qualification_name.title}})</div>
                                            </h6>
                                            <div class="media mb-3">
                                                <div class="media-body mx-2">
                                                    <div class="text-muted small">
                                                        <div class=""><i class="fa fa-university"></i> {{course.university.name}}
                                                            <div style="display: inline;font-size: 11px;position: relative;top: -1px;color: #c52228;" v-if="course.university">({{course.university.city}} ,{{course.university.country}})</div>
                                                        </div>
                                                        <div class=""><i class="fa fa-book"></i> <span v-if="course.subject">{{course.subject.name}}</span></div>
                                                        <div class=""><i class="fa fa-calendar"></i> {{(course.duration!==null)?course.duration:''}}</div>
                                                        <div class=""><i class="fa fa-dollar"></i> {{(course.yearly_fee)?course.yearly_fee:''}}</div>
                                                        <button style="margin-top:10px; box-shadow: none !important; outline: none !important; border-radius: 0px 0px 5px 5px; border: none !important; " class="btn btn-success btn-sm col-md-12 view-all-link" onclick="send_emailcontat(this,'course')">Request information <i style="display: none;">'{{course.id}}'</i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btn-group p-0 mx-3" v-if="authtype == 'student'">
                                                <form class="save-for-later-form" action="<?php echo e(route('addToWishlist')); ?>" method="post" @submit="addToWishlist($event)">
                                                    <?php echo e(csrf_field()); ?>

                                                    <button type="submit" class="btn py-1 border u-small80 c-actionBtn"><i class="fa fa-heart"></i> Save </button>

                                                    <input type="hidden" :value="course.id" name="course_id">
                                                </form>
                                            </div>
                                            <div class="wishlist-status" style="font-size: 12px;color: rgb(197, 34, 40);margin-top: 5px;position: absolute;bottom:9px;width: 100%;"></div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <p v-else class="not-found">No Course Found </p>
                        </section>
                        <section class="container o-flex-center mb-5">
                            <nav aria-label="Page navigation" v-if="courses.last_page > 1">
                                <ul class="pagination small">
                                    <li v-if="courses.current_page != 1" class="page-item">
                                        <a style="cursor:pointer;" class="page-link" @click="fetchData(page--)">
                                            <i class="fa fa-chevron-left"></i>
                                        </a>
                                    </li>
                                    <div style="display:flex;" v-if="courses.current_page <= 3 || courses.last_page <= 5">
                                        <div v-if="courses.last_page <= 5 " style="display:flex;">
                                            <li v-for="i in courses.last_page" :class="(courses.current_page == i) ? 'active page-item' : 'page-item'">
                                                <a style="cursor:pointer;" class="page-link" @click="fetchData(page=i)" v-text="i"></a>
                                            </li>
                                        </div>
                                        <div v-else style="display:flex;">
                                            <li v-for="i in 5" :class="(courses.current_page == i) ? 'active page-item' : 'page-item'">
                                                <a style="cursor:pointer;" class="page-link" @click="fetchData(page=i)" v-text="i"></a>
                                            </li>
                                            <li class="page-item">
                                                <a style="cursor:pointer;" class="page-link">...</a>
                                            </li>
                                            <li :class="(courses.current_page == courses.last_page)">
                                                <a style="cursor:pointer;" class="page-link" @click="fetchData(page=courses.last_page)" v-text="courses.last_page"></a>
                                            </li>
                                        </div>
                                    </div>
                                    <div style="display:flex;" v-else-if="courses.current_page == courses.last_page || courses.current_page == courses.last_page-1">
                                        <li class="page-item">
                                            <a style="cursor:pointer;" class="page-link" @click="fetchData(page=1)" v-text="'1'"></a>
                                        </li>
                                        <li class="page-item">
                                            <a style="cursor:pointer;" class="page-link">...</a>
                                        </li>
                                        <li v-for="i in [courses.last_page-4, courses.last_page-3, courses.last_page-2, courses.last_page-1, courses.last_page]" :class="(courses.current_page == i) ? 'active page-item' : 'page-item'">
                                            <a style="cursor:pointer;" class="page-link" @click="fetchData(page=i)" v-text="i"></a>
                                        </li>
                                    </div>
                                    <div style="display:flex;" v-else>
                                        <li class="page-item">
                                            <a style="cursor:pointer;" class="page-link" @click="fetchData(page=1)" v-text="'1'"></a>
                                        </li>
                                        <li class="page-item">
                                            <a style="cursor:pointer;" class="page-link">...</a>
                                        </li>
                                        <li v-for="i in [courses.current_page-2, courses.current_page-1, courses.current_page, courses.current_page+1, courses.current_page+2]" :class="(courses.current_page == i) ? 'active page-item' : 'page-item'">
                                            <a style="cursor:pointer;" class="page-link" @click="fetchData(page=i)" v-text="i"></a>
                                        </li>
                                        <li class="page-item">
                                            <a style="cursor:pointer;" class="page-link">...</a>
                                        </li>
                                        <li class="page-item">
                                            <a style="cursor:pointer;" class="page-link" @click="fetchData(page=courses.last_page)" v-text="courses.last_page"></a>
                                        </li>
                                    </div>
                                    <li v-if="courses.current_page != courses.last_page" class="page-item">
                                        <a style="cursor:pointer;" class="page-link" @click="fetchData(page++)">
                                            <i class="fa fa-chevron-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </section>
                    </div>

                    <div class="uni_lists type_gui">
                        <h5 class="showing-now">Showing <span v-if="(guides && guides.total>0)"><span v-if="limit<guides.total" v-text="limit"></span><span v-else>{{guides.total}}</span> out of {{guides.total}}</span><span v-else>0</span></h5>

                        <section class="mb-3">

                            <div class="row" v-if="guides.data && guides.data.length>0">
                                <div class="col-md-3 col-sm-12 col-xs-12" v-for="guide in guides.data">
                                    <article class="row no-gutters align-items-center flex-nowrap border-bottom border-top u-small95 pt-4 course-articles">
                                        <div class="col search-grad" style="text-align: center;">

                                            <a :href="baseUrl+'/guides/'+guide.slug" target="_blank">
                                                <img class="img-fluid universities-card-image"  :src="(guide.university_id!==null)?''+baseUrl+'/'+optImage(guide.university.logo,'thumbs')+'':''">
                                            </a>

                                            <h6><a :href="baseUrl+'/guides/'+guide.slug" v-text="guide.title" target="_blank"></a></h6>
                                            <div class="media mb-3">
                                                <div class="media-body mx-2">
                                                    <div class="text-muted small">
                                                        <div class="" v-if="guide.university_id!==null"><i class="fa fa-university"></i> {{guide.university.name}}
                                                            <div style="display: inline;font-size: 11px;position: relative;top: -1px;color: #c52228;" v-if="guide.university">({{guide.university.city}} ,{{guide.university.country}})</div>
                                                        </div>
                                                        <div class="" v-else><i class="fa fa-book"></i> <span v-if="guide.subject">{{guide.subject.name}}</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <p v-else class="not-found">No Course Found</p>

                        </section>

                        <section class="container o-flex-center mb-5">
                            <nav aria-label="Page navigation" v-if="guides.last_page > 1">
                                <ul class="pagination small">
                                    <li v-if="guides.current_page != 1" class="page-item">
                                        <a style="cursor:pointer;" class="page-link" @click="fetchData(page--)">
                                            <i class="fa fa-chevron-left"></i>
                                        </a>
                                    </li>
                                    <div style="display:flex;" v-if="guides.current_page <= 3 || guides.last_page <= 5">
                                        <div v-if="guides.last_page <= 5 " style="display:flex;">
                                            <li v-for="i in guides.last_page" :class="(guides.current_page == i) ? 'active page-item' : 'page-item'">
                                                <a style="cursor:pointer;" class="page-link" @click="fetchData(page=i)" v-text="i"></a>
                                            </li>
                                        </div>
                                        <div v-else style="display:flex;">
                                            <li v-for="i in 5" :class="(guides.current_page == i) ? 'active page-item' : 'page-item'">
                                                <a style="cursor:pointer;" class="page-link" @click="fetchData(page=i)" v-text="i"></a>
                                            </li>
                                            <li class="page-item">
                                                <a style="cursor:pointer;" class="page-link">...</a>
                                            </li>
                                            <li :class="(guides.current_page == guides.last_page)">
                                                <a style="cursor:pointer;" class="page-link" @click="fetchData(page=guides.last_page)" v-text="guides.last_page"></a>
                                            </li>
                                        </div>
                                    </div>
                                    <div style="display:flex;" v-else-if="guides.current_page == guides.last_page || guides.current_page == guides.last_page-1">
                                        <li class="page-item">
                                            <a style="cursor:pointer;" class="page-link" @click="fetchData(page=1)" v-text="'1'"></a>
                                        </li>
                                        <li class="page-item">
                                            <a style="cursor:pointer;" class="page-link">...</a>
                                        </li>
                                        <li v-for="i in [guides.last_page-4, guides.last_page-3, guides.last_page-2, guides.last_page-1, guides.last_page]" :class="(guides.current_page == i) ? 'active page-item' : 'page-item'">
                                            <a style="cursor:pointer;" class="page-link" @click="fetchData(page=i)" v-text="i"></a>
                                        </li>
                                    </div>
                                    <div style="display:flex;" v-else>
                                        <li class="page-item">
                                            <a style="cursor:pointer;" class="page-link" @click="fetchData(page=1)" v-text="'1'"></a>
                                        </li>
                                        <li class="page-item">
                                            <a style="cursor:pointer;" class="page-link">...</a>
                                        </li>
                                        <li v-for="i in [guides.current_page-2, guides.current_page-1, guides.current_page, guides.current_page+1, guides.current_page+2]" :class="(guides.current_page == i) ? 'active page-item' : 'page-item'">
                                            <a style="cursor:pointer;" class="page-link" @click="fetchData(page=i)" v-text="i"></a>
                                        </li>
                                        <li class="page-item">
                                            <a style="cursor:pointer;" class="page-link">...</a>
                                        </li>
                                        <li class="page-item">
                                            <a style="cursor:pointer;" class="page-link" @click="fetchData(page=guides.last_page)" v-text="guides.last_page"></a>
                                        </li>
                                    </div>
                                    <li v-if="guides.current_page != guides.last_page" class="page-item">
                                        <a style="cursor:pointer;" class="page-link" @click="fetchData(page++)">
                                            <i class="fa fa-chevron-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </section>
                    </div>
                    <div class="uni_lists type_art">
                        <h5 class="showing-now">Showing <span v-if="(articles && articles.total>0)"><span v-if="limit<articles.total" v-text="limit"></span><span v-else>{{articles.total}}</span> out of {{articles.total}}</span><span v-else>0</span></h5>

                        <section class="mb-3">

                            <div class="row" v-if="articles.data && articles.data.length>0">
                                <div class="col-md-3 col-sm-12 col-xs-12" v-for="article in articles.data">
                                    <article class="row no-gutters align-items-center flex-nowrap border-bottom border-top u-small95 pt-4 course-articles img_cover">
                                        <div class="col search-grad" style="text-align: center;">

                                            <a :href="baseUrl+'/'+article.slug" target="_blank">
                                                <img class="img-fluid universities-card-image" :src="''+baseUrl+'/'+optImage(article.image,'thumbs')+''">
                                            </a>

                                            <h6 style="padding-left: 5px;"><a :href="baseUrl+'/'+article.slug" v-text="article.title" target="_blank"></a></h6>
                                            <div class="media mb-3">
                                                <div class="media-body mx-2">
                                                    <div class="text-muted small">
                                                        <div class="">{{article.short_description}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <p v-else class="not-found">No Articles Found</p>

                        </section>

                        <section class="container o-flex-center mb-5">
                            <nav aria-label="Page navigation" v-if="articles.last_page > 1">
                                <ul class="pagination small">
                                    <li v-if="articles.current_page != 1" class="page-item">
                                        <a style="cursor:pointer;" class="page-link" @click="fetchData(page--)">
                                            <i class="fa fa-chevron-left"></i>
                                        </a>
                                    </li>
                                    <div style="display:flex;" v-if="articles.current_page <= 3 || articles.last_page <= 5">
                                        <div v-if="articles.last_page <= 5 " style="display:flex;">
                                            <li v-for="i in articles.last_page" :class="(articles.current_page == i) ? 'active page-item' : 'page-item'">
                                                <a style="cursor:pointer;" class="page-link" @click="fetchData(page=i)" v-text="i"></a>
                                            </li>
                                        </div>
                                        <div v-else style="display:flex;">
                                            <li v-for="i in 5" :class="(articles.current_page == i) ? 'active page-item' : 'page-item'">
                                                <a style="cursor:pointer;" class="page-link" @click="fetchData(page=i)" v-text="i"></a>
                                            </li>
                                            <li class="page-item">
                                                <a style="cursor:pointer;" class="page-link">...</a>
                                            </li>
                                            <li :class="(articles.current_page == articles.last_page)">
                                                <a style="cursor:pointer;" class="page-link" @click="fetchData(page=articles.last_page)" v-text="articles.last_page"></a>
                                            </li>
                                        </div>
                                    </div>
                                    <div style="display:flex;" v-else-if="articles.current_page == articles.last_page || articles.current_page == articles.last_page-1">
                                        <li class="page-item">
                                            <a style="cursor:pointer;" class="page-link" @click="fetchData(page=1)" v-text="'1'"></a>
                                        </li>
                                        <li class="page-item">
                                            <a style="cursor:pointer;" class="page-link">...</a>
                                        </li>
                                        <li v-for="i in [articles.last_page-4, articles.last_page-3, articles.last_page-2, articles.last_page-1, articles.last_page]" :class="(articles.current_page == i) ? 'active page-item' : 'page-item'">
                                            <a style="cursor:pointer;" class="page-link" @click="fetchData(page=i)" v-text="i"></a>
                                        </li>
                                    </div>
                                    <div style="display:flex;" v-else>
                                        <li class="page-item">
                                            <a style="cursor:pointer;" class="page-link" @click="fetchData(page=1)" v-text="'1'"></a>
                                        </li>
                                        <li class="page-item">
                                            <a style="cursor:pointer;" class="page-link">...</a>
                                        </li>
                                        <li v-for="i in [articles.current_page-2, articles.current_page-1, articles.current_page, articles.current_page+1, articles.current_page+2]" :class="(articles.current_page == i) ? 'active page-item' : 'page-item'">
                                            <a style="cursor:pointer;" class="page-link" @click="fetchData(page=i)" v-text="i"></a>
                                        </li>
                                        <li class="page-item">
                                            <a style="cursor:pointer;" class="page-link">...</a>
                                        </li>
                                        <li class="page-item">
                                            <a style="cursor:pointer;" class="page-link" @click="fetchData(page=articles.last_page)" v-text="articles.last_page"></a>
                                        </li>
                                    </div>
                                    <li v-if="articles.current_page != articles.last_page" class="page-item">
                                        <a style="cursor:pointer;" class="page-link" @click="fetchData(page++)">
                                            <i class="fa fa-chevron-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php $__env->startPush('scripts'); ?>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });


    var content234 = new Vue({
        // Vue.component('pagination', require('laravel-vue-pagination')),
        el: '#student_main_search',
        data: {
            authtype: '<?php echo e((auth()->check())?auth()->user()->user_type:0); ?>',
            url: '<?php echo e(route("getCourses")); ?>',
            baseUrl: '<?php echo e(url("/")); ?>',
            universities: [],
            courses: [],
            guides: [],
            articles: [],
            tags: [],
            qualification: [],
            guide: [],
            subject: "<?php echo e(($_GET['subject'])??''); ?>",
            star: "<?php echo e(($_GET['star'])??''); ?>",
            scholarship: "<?php echo e(($_GET['scholarship'])??2); ?>",
            // languages:[],
            university: "<?php echo e(($_GET['university'])??''); ?>",
            search: "<?php echo e(($_GET['search'])??''); ?>",
            minDur: "<?php echo e(($_GET['minDur'])??''); ?>",
            maxDur: "<?php echo e(($_GET['maxDur'])??''); ?>",
            minFee: "<?php echo e(($_GET['minFee'])??''); ?>",
            maxFee: "<?php echo e(($_GET['maxFee'])??''); ?>",
            type: "<?php echo e(($_GET['type'])??'university'); ?>",
            location: "<?php echo e(($_GET['location'])??''); ?>",
            page: 1,
            limit: '<?php echo e(($meta['
            limit '])??12); ?>',
            allFilters: 0,
            counter: 1,
        },
        created() {},
        methods: {
            fetchData(page) {
                var _this = this;
                var data = '?';
                data += 'page=' + _this.page;
                (_this.limit !== '') ? data += '&limit=' + _this.limit: '';
                (_this.location !== '') ? data += '&location=' + _this.location: '';
                (_this.search !== '') ? data += '&search=' + _this.search: '';
                (_this.scholarship !== '') ? data += '&scholarship=' + _this.scholarship: '';
                (_this.subject !== '') ? data += '&subject=' + _this.subject: '';
                (_this.university !== '') ? data += '&university=' + _this.university: '';
                (_this.star !== '') ? data += '&star=' + _this.star: '';
                (_this.type !== '') ? data += '&type=' + _this.type: '';
                (_this.minDur !== '') ? data += '&minDur=' + _this.minDur: '';
                (_this.maxDur !== '') ? data += '&maxDur=' + _this.maxDur: '';
                (_this.minFee !== '') ? data += '&minFee=' + _this.minFee: '';
                (_this.maxFee !== '') ? data += '&maxFee=' + _this.maxFee: '';
                // (_this.languages.length>0)?data+='&languages='+_this.languages:'';
                (_this.guide.length > 0) ? data += '&guide=' + _this.guide: '';
                (_this.qualification.length > 0) ? data += '&qualification=' + _this.qualification: '';


                window.history.pushState({
                    path: '<?php echo e(request()->url()); ?>' + data
                }, '', '<?php echo e(request()->url()); ?>' + data);

                if (!$('.t_loader_removethis').is(':visible')) {
                    $('.t_loader_removethis').fadeIn(200)
                    $('.uni_lists').fadeOut(200);
                }
                // _this.makeTags();
                console.log(_this.url)
                axios.get(_this.url + data)
                    .then(response => {
                        _this.universities = response.data.universities;
                        console.log(_this.universities);
                        _this.courses = response.data.courses;
                        _this.guides = response.data.guides;
                        _this.articles = response.data.articles;
                        $(function() {
                            if (_this.type == 'course') {

                                $('#university_hide_this').hide();
                                $('#course_hide_this').show();
                                $('#guide_hide_this').hide();
                                $('#articles_hide_this').hide();

                                $('.type_cou').fadeIn(200);
                                $('.show-sub').fadeIn(300);
                                $('.show-sch').fadeIn(300);
                                $('.show-lan').fadeIn(300);
                                $('.show-qua').fadeIn(300);
                                $('.show-rat').fadeOut(300);
                                $('.show-dur').fadeIn(300);
                                $('.show-uni').fadeIn(300);
                                $('.show-gui').fadeOut(300);
                                $('.show-fee').fadeIn(300);
                            } else if (_this.type == 'guide') {

                                $('#university_hide_this').hide();
                                $('#course_hide_this').hide();
                                $('#guide_hide_this').show();
                                $('#articles_hide_this').hide();

                                $('.type_gui').fadeIn(200);
                                $('.show-sub').fadeOut(300);
                                $('.show-sch').fadeOut(300);
                                $('.show-lan').fadeOut(300);
                                $('.show-qua').fadeOut(300);
                                $('.show-rat').fadeOut(300);
                                $('.show-dur').fadeOut(300);
                                $('.show-uni').fadeOut(300);
                                $('.show-gui').fadeIn(300);
                                $('.show-fee').fadeOut(300);
                            } else if (_this.type == 'articles') {

                                $('#university_hide_this').hide();
                                $('#course_hide_this').hide();
                                $('#guide_hide_this').hide();
                                $('#articles_hide_this').show();

                                $('.type_art').fadeIn(200);
                                $('.show-sub').fadeOut(300);
                                $('.show-sch').fadeOut(300);
                                $('.show-lan').fadeOut(300);
                                $('.show-qua').fadeOut(300);
                                $('.show-rat').fadeOut(300);
                                $('.show-dur').fadeOut(300);
                                $('.show-uni').fadeOut(300);
                                $('.show-gui').fadeOut(300);
                                $('.show-fee').fadeOut(300);
                            } else {

                                $('#university_hide_this').show();
                                $('#course_hide_this').hide();
                                $('#guide_hide_this').hide();
                                $('#articles_hide_this').hide();

                                $('.type_uni').fadeIn(200);
                                $('.show-sub').fadeOut(300);
                                $('.show-sch').fadeIn(300);
                                $('.show-lan').fadeIn(300);
                                $('.show-qua').fadeIn(300);
                                $('.show-rat').fadeIn(300);
                                $('.show-dur').fadeOut(300);
                                $('.show-uni').fadeOut(300);
                                $('.show-gui').fadeOut(300);
                                $('.show-fee').fadeOut(300);
                            }

                            $('.t_loader_removethis').delay(500).fadeOut(200);

                        });
                    }).catch(error => {
                        if (_this.counter < 5) {
                            _this.fetchData(_this.page);
                            _this.counter++;
                        } else {
                            if ($('.t_loader_removethis').is(':visible')) {
                                $('.t_loader_removethis').fadeOut(200)
                                $('.type_uni').fadeIn(200);
                            }
                        }
                    });
            },
            countrySelected() {
                this.fetchData(this.page = 1);
            },
            addToWishlist(event) {
                event.preventDefault();
                var action = $(event.target).attr('action');
                var data = $(event.target).serialize();
                axios.post(action, data)
                    .then(response => {
                        if (response.data == 'success') {
                            $(event.target).parent().parent().find('.wishlist-status').text('Successfully saved to wishlist');
                            $(event.target).parent().parent().find('.wishlist-status').fadeIn(300).delay(5000).fadeOut(300);
                        } else {
                            $(event.target).parent().parent().find('.wishlist-status').text('Already in your wishlist');
                            $(event.target).parent().parent().find('.wishlist-status').fadeIn(300).delay(5000).fadeOut(300);
                        }
                    }).catch(errror => {

                    });
            },
            changeTypeTo(event, type) {
                var _this = this;
                _this.type = type;
                $('.tabs-links').removeClass('active');
                $(event.target).addClass('active');
                $('.dsp-0').fadeOut(100);
                if (_this.type == 'course') {
                    $('.type_cou').fadeIn(200);
                    $('.show-sub').fadeIn(300);
                    $('.show-sch').fadeIn(300);
                    $('.show-lan').fadeIn(300);
                    $('.show-qua').fadeIn(300);
                    $('.show-rat').fadeOut(300);
                    $('.show-dur').fadeIn(300);
                    $('.show-uni').fadeIn(300);
                    $('.show-gui').fadeOut(300);
                    $('.show-fee').fadeIn(300);
                } else if (_this.type == 'guide') {
                    $('.type_gui').fadeIn(200);
                    $('.show-sub').fadeOut(300);
                    $('.show-sch').fadeOut(300);
                    $('.show-lan').fadeOut(300);
                    $('.show-qua').fadeOut(300);
                    $('.show-rat').fadeOut(300);
                    $('.show-dur').fadeOut(300);
                    $('.show-uni').fadeOut(300);
                    $('.show-gui').fadeIn(300);
                    $('.show-fee').fadeOut(300);
                } else if (_this.type == 'articles') {
                    $('.type_art').fadeIn(200);
                    $('.show-sub').fadeOut(300);
                    $('.show-sch').fadeOut(300);
                    $('.show-lan').fadeOut(300);
                    $('.show-qua').fadeOut(300);
                    $('.show-rat').fadeOut(300);
                    $('.show-dur').fadeOut(300);
                    $('.show-uni').fadeOut(300);
                    $('.show-gui').fadeOut(300);
                    $('.show-fee').fadeOut(300);
                } else {
                    $('.type_uni').fadeIn(200);
                    $('.show-sub').fadeOut(300);
                    $('.show-sch').fadeIn(300);
                    $('.show-lan').fadeIn(300);
                    $('.show-qua').fadeIn(300);
                    $('.show-rat').fadeIn(300);
                    $('.show-dur').fadeOut(300);
                    $('.show-uni').fadeOut(300);
                    $('.show-gui').fadeOut(300);
                    $('.show-fee').fadeOut(300);
                }
                _this.page = 1;
                this.fetchData(_this.page);
            },
            filterQual(event) {
                var _this = this;
                $(document).ready(function() {
                    var input = $(event.target).parent().find('input');
                    var val = input.val();
                    if (input.is(':checked')) {
                        _this.qualification.push(val);
                    } else {
                        _this.qualification.splice(_this.qualification.indexOf(val), 1);
                    }
                    console.log(_this.qualification)
                    _this.fetchData(_this.page = 1);
                });
            },
            filterC(event, type) {
                if (type == 'languages') {
                    var _this = this;
                    $(document).ready(function() {
                        var input = $(event.target).parent().find('input');
                        var val = input.val();
                        if (!_this.languages.includes(val)) {
                            _this.languages.push(val);
                        } else {
                            _this.languages.splice(_this.languages.indexOf(val), 1);
                        }
                    });
                } else if (type == 'scholarship') {
                    var _this = this;
                    $(document).ready(function() {
                        var input = $(event.target).parent().find('input');
                        var val = input.val();
                        _this.scholarship = val;
                    });
                } else if (type == 'guide') {
                    var _this = this;
                    $(document).ready(function() {
                        var input = $(event.target).parent().find('input');
                        var val = input.val();
                        if (!_this.guide.includes(val)) {
                            _this.guide.push(val);
                        } else {
                            _this.guide.splice(_this.guide.indexOf(val), 1);
                        }
                    });
                }
                _this.fetchData(_this.page = 1);
            },
            rating(rating) {
                var rate = rating.toString().split('.');
                var html = '';
                if (rate[0] !== 0) {
                    for (var i = 0; i < (rate[0] * 1); i++) {
                        html += '<i class="fa fa-star"></i>';
                    }
                }
                if (rate[1] !== undefined && rate[1] >= 5) {
                    html += '<i class="fa fa-star-half"></i>';
                }
                return html
            },
            iph() {

                return '<?php echo e(url(iph())); ?>';
            },
            optImage(file, size = null) {
                var _this = this;
                var url = '<?php echo e(iph()); ?>';
                console.log()
                if (file == null) {
                    return url;
                }
                var thumb = file.split("/");
                var sliced = thumb.slice(1, thumb.length - 1);
                var temp = sliced.join('/');
                var ext = file.split(".").pop().toLowerCase();
                if (!['jpg', 'png', 'jpeg', 'svg', 'gif', 'exif', 'bmp'].includes(ext)) {
                    return url;
                }
                if (size !== null) {
                    url = temp + '/' + size + '/' + thumb.pop();
                } else {
                    if ('<?php echo e(is_mobile()); ?>' * 1) {
                        size = 'small';
                        url = temp + '/' + size + '/' + thumb.pop();
                    } else {
                        if ('<?php echo e(op_image()); ?>' * 1 == 1) {
                            size = 'optimize';
                            url = temp + '/' + size + '/' + thumb.pop();
                        } else {
                            url = temp + '/' + thumb.pop();
                        }
                    }
                }
                return url;
            },
        },
        mounted() {
            var _this = this;
            $(document).ready(function() {

                $('input[name="qualification[]"]').each(function() {
                    if ($(this).is(':checked')) {
                        _this.qualification.push($(this).val());
                    }
                });

                /*$('input[name="languages[]"]').each(function(){
                    if($(this).is(':checked')){
                        _this.languages.push($(this).val());
                    }
                });*/


                $('input[name="guide[]"]').each(function() {
                    if ($(this).is(':checked')) {
                        _this.guide.push($(this).val());
                    }
                });
                setTimeout(() => {
                    _this.fetchData(_this.page);
                }, 500)

                $('.main_search').on('keyup', function() {
                    _this.search = $(this).val();
                    console.log(_this.search)
                    _this.fetchData(_this.page = 1);
                });

                $('.loc_search').on('keyup', function() {
                    // _this.search = $(this).val();
                    // console.log(_this.search)
                    _this.fetchData(_this.page = 1);
                });

                $('.filter-btn').on('click', function() {
                    var box = $(this).next('.filter-box');
                    if (box.is(':visible')) {
                        box.slideToggle("slow", function() {
                            $(this).fadeOut(200)
                        });
                    } else {
                        box.slideToggle("slow", function() {
                            $(this).fadeIn(200)
                        });
                    }
                })

                $(document).on('change', '.university-select', function() {
                    var val = $(this).val();
                    _this.university = val;
                    _this.fetchData(_this.page = 1);
                });

                $(document).on('change', '.subject-select', function() {
                    var val = $(this).val();
                    _this.subject = val;
                    _this.fetchData(_this.page = 1);
                });

                $(document).on('change', '.type-select', function() {
                    var val = $(this).val();
                    _this.type = val;
                    $('.dsp-0').fadeOut(100);
                    if (_this.type == 'university') {
                        $('.show-sub').fadeOut(300);
                        $('.show-sch').fadeIn(300);
                        $('.show-lan').fadeIn(300);
                        $('.show-qua').fadeIn(300);
                        $('.show-rat').fadeIn(300);
                        $('.show-dur').fadeOut(300);
                        $('.show-uni').fadeOut(300);
                        $('.show-gui').fadeOut(300);
                        // $('.uni_lists').fadeOut(300); $('.type_uni').delay(300).fadeIn(300);
                    } else if (_this.type == 'course') {
                        $('.show-sub').fadeIn(300);
                        $('.show-sch').fadeIn(300);
                        $('.show-lan').fadeIn(300);
                        $('.show-qua').fadeIn(300);
                        $('.show-rat').fadeOut(300);
                        $('.show-dur').fadeIn(300);
                        $('.show-uni').fadeIn(300);
                        $('.show-gui').fadeOut(300);
                        // $('.uni_lists').fadeOut(300); $('.type_cou').delay(300).fadeIn(300);
                    } else if (_this.type == 'guide') {
                        $('.show-sub').fadeOut(300);
                        $('.show-sch').fadeOut(300);
                        $('.show-lan').fadeOut(300);
                        $('.show-qua').fadeOut(300);
                        $('.show-rat').fadeOut(300);
                        $('.show-dur').fadeOut(300);
                        $('.show-uni').fadeOut(300);
                        $('.show-gui').fadeIn(300);
                        // $('.uni_lists').fadeOut(300); $('.type_gui').delay(300).fadeIn(300);
                    } else if (_this.type == 'art') {
                        $('.show-sub').fadeOut(300);
                        $('.show-sch').fadeOut(300);
                        $('.show-lan').fadeOut(300);
                        $('.show-qua').fadeOut(300);
                        $('.show-rat').fadeOut(300);
                        $('.show-dur').fadeOut(300);
                        $('.show-uni').fadeOut(300);
                        $('.show-gui').fadeOut(300);
                        // $('.uni_lists').fadeOut(300); $('.type_art').delay(300).fadeIn(300);
                    }
                    _this.fetchData(_this.page = 1);
                });

                $(document).on('click', '.see-more-btn', function() {

                    $('.see-more').toggle(500, function() {
                        if ($(this).is(':visible')) {
                            $('.see-more-btn').text('See Less');
                            _this.allFilters = 0;
                        } else {
                            $('.see-more-btn').text('See More');
                            _this.allFilters = 1;
                        }
                    });
                })

                $(document).on('change', '.duration-select', function() {
                    var name = $(this).attr('name');
                    var val = $(this).val();
                    console.log(name);
                    if (name == 'minDur') {
                        _this.minDur = val;
                    } else if (name == 'maxDur') {
                        _this.maxDur = val;
                    }
                    _this.fetchData(_this.page = 1);
                });

                $('.stars').on('mouseenter', '.review-star', function() {
                    $(this).addClass('till');
                    $('.stars').find('.review-star').each(function() {
                        $(this).css('color', '#c52228');
                        if ($(this).hasClass('till')) {
                            return false;
                        }
                    })
                })
                $('.stars').on('click', '.review-star', function() {
                    $('.stars').find('.review-star').removeClass('checked-star');
                    $(this).addClass('checked-star');
                    var count = 0;
                    $('.stars').find('.review-star').each(function() {
                        $(this).css('color', '#c52228');
                        count++
                        if ($(this).hasClass('checked-star')) {
                            return false;
                        }
                        $(this).addClass('checked-star');
                    })
                    _this.star = count;
                    _this.fetchData(_this.page = 1);
                })
                $('.stars').on('mouseleave', '.review-star', function() {
                    $(this).removeClass('till');
                    $('.review-star').css('color', '#dad7d7');
                });

            });
        },

    });
</script>

<script>
    function send_emailcontat(d, atttype) {
        var innerhtmlone = d.innerHTML;
        var attid = innerhtmlone.replace(/\D/g, "");

        var urltosend = '/sendbtnemail/' + attid + '/' + atttype + '';

        swal({
                title: "Do you want to request information directly from University?",
                text: "Information will be send to university!",
                icon: "warning",
                buttons: true,
                successMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {

                    jQuery.ajax({
                        type: 'GET',
                        url: urltosend,
                        data: {},
                        dataType: "json",
                        success: function(data) {

                            if (data.message == 'success') {

                                swal("Success!", data.message_text, "success");

                            } else if (data.message == 'login') {

                                swal({
                                        title: "You are not login!",
                                        text: "Please Login To Send Information Request",
                                        icon: "warning",
                                        buttons: true,
                                        dangerMode: false,
                                        buttons: ["Cancel", "Login Now"],
                                    })
                                    .then((willDelete) => {
                                        if (willDelete) {

                                            $("#login_model").modal("show");

                                        } else {

                                        }
                                    });

                            } else {

                                swal("Failure!", data.message_text, "error");

                            }

                        }
                    });

                } else {
                    return false;
                }
            });


    }
</script>


<?php $__env->stopPush(); ?>

<?php endif; ?>
<?php endif; ?>