<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul>
                <li class="menu-title">Navigation</li>

                <li>
                    <a href="<?php echo e(url("/admin/home")); ?>"><i class="mdi mdi-view-dashboard"></i> <span> Dashboard </span> </a>
                </li>

<!-- new work  start-->

                <!-- Check if the user has permission to access the slider -->
                <?php if(isset($permissions)): ?>
                <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                $permissionArray = json_decode($permission->admin_permissions, true);
                ?>
                
                <?php if(isset($permissionArray['slider']) && $permissionArray['slider'] === 'on' && $permission->admin_id == auth()->user()->id): ?>
                <li>
                    <a href="<?php echo e(route('sliders')); ?>"><i class="mdi mdi-apps"></i> <span> Sliders </span> </a>
                </li>
                <?php endif; ?>

                <?php if(isset($permissionArray['apply_online']) && $permissionArray['apply_online'] === 'on' && $permission->admin_id == auth()->user()->id): ?>
                <li>
                    <a href="#">
                        <i class="mdi mdi-view-dashboard"></i> <span> Apply Online </span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if(isset($permissionArray['free_consultation']) && $permissionArray['free_consultation'] === 'on' && $permission->admin_id == auth()->user()->id): ?>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-clipboard-check"></i> <span> Consultant </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo e(route('admin_consultant')); ?>">Consultant List</a></li>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if(isset($permissionArray['pages']) && $permissionArray['pages'] === 'on' && $permission->admin_id == auth()->user()->id): ?>
                <li>
                    <a href="#">
                        <i class="mdi mdi-view-dashboard"></i> <span> Pages </span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if(isset($permissionArray['articles']) && $permissionArray['articles'] === 'on' && $permission->admin_id == auth()->user()->id): ?>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-clipboard-check"></i> <span> Articles </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <?php if(check_access(Auth::user()->id,'blog','_show')==1): ?>
                        <li><a href="<?php echo e(route('blog.index')); ?>">Articles List</a></li>
                        <?php endif; ?>
                        <?php if(check_access(Auth::user()->id,'blog','_create')==1): ?><li><a href="<?php echo e(route('blog.create')); ?>">Add Articles</a></li><?php endif; ?>
                        <?php if(check_access(Auth::user()->id,'category','_show')==1): ?><li><a href="<?php echo e(route('blog-category.index')); ?>">Category List</a></li><?php endif; ?>

                    </ul>
                </li>
                <?php endif; ?>

                <?php if(isset($permissionArray['visit_visa']) && $permissionArray['visit_visa'] === 'on' && $permission->admin_id == auth()->user()->id): ?>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-clipboard-check"></i> <span> Visit Visa </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo e(route('visacountries.index')); ?>">Visa Countries</a></li>
                        <li><a href="<?php echo e(route('visadetails.index')); ?>">Visa Details</a></li>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if(isset($permissionArray['course']) && $permissionArray['course'] === 'on' && $permission->admin_id == auth()->user()->id): ?>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-clipboard-check"></i> <span> Course </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo e(route('course.index')); ?>">Course List</a></li>
                        <?php if(check_access(Auth::user()->id,'course','_create')==1): ?>
                        <li><a href="<?php echo e(route('course.create')); ?>">Add Course</a></li>
                        <?php endif; ?>
                        <li><a href="<?php echo e(route('subject.index')); ?>">Subject List</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-clipboard-check"></i> <span> Free consulation </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="/admin/free-consulation"> Free consulation List</a></li>
                        <li><a href="/admin/apply-now"> Apply Now List</a></li>

                    </ul>
                </li>
                <?php endif; ?>

                


                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

                <!-- new work end -->

                <!-- new work end -->

                <?php if(Auth::user()->id == 1): ?>
                <?php $__currentLoopData = show_post_types(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(check_access(Auth::user()->id,$type->slug,'_show')==1): ?>
                <li class="has_sub">v
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-clipboard-check"></i> <span> <?php echo e($type->name); ?> </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo e(route('posts_lists',$type->slug)); ?>"><?php echo e($type->name); ?> List</a></li>
                        <?php if(check_access(Auth::user()->id,$type->slug,'_create')==1): ?>
                        <li><a href="<?php echo e(route('create_post',$type->slug)); ?>">Add <?php echo e($type->name); ?></a></li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php if(check_access(Auth::user()->id,'sliders','_show')==1): ?>
                <li>
                    <a href="<?php echo e(route('sliders')); ?>"><i class="mdi mdi-apps"></i> <span> Sliders </span> </a>
                </li>
                <?php endif; ?>

                <?php if(check_access(Auth::user()->id,'admin','_show')==1): ?>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-clipboard-check"></i> <span> Admin Register</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo e(route('admin-register')); ?>"> Create Admin Account</a></li>
                        <li><a href="<?php echo e(route('admin-users')); ?>"> Admin Users List</a></li>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if(check_access(Auth::user()->id,'university','_show')==1): ?>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-clipboard-check"></i> <span> University </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo e(route('university.index')); ?>">University List</a></li>
                        <?php if(check_access(Auth::user()->id,'university','_create')==1): ?>
                        <li><a href="<?php echo e(route('university.create')); ?>">Add University</a></li>
                        <li><a href="<?php echo e(route('cities.index')); ?>">Countries</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>
                

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-clipboard-check"></i> <span> countries </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo e(route('countryList')); ?>">Country List</a></li>
                        <li><a href="<?php echo e(route('addCountry')); ?>">Add Country</a></li>
                    </ul>
                </li>

                <?php if(check_access(Auth::user()->id,'course','_show')==1): ?>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-clipboard-check"></i> <span> Course </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo e(route('course.index')); ?>">Course List</a></li>
                        <?php if(check_access(Auth::user()->id,'course','_create')==1): ?>
                        <li><a href="<?php echo e(route('course.create')); ?>">Add Course</a></li>
                        <?php endif; ?>
                        <li><a href="<?php echo e(route('subject.index')); ?>">Subject List</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-clipboard-check"></i> <span> Free consulation </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="/admin/free-consulation"> Free consulation List</a></li>
                        <li><a href="/admin/apply-now"> Apply Now List</a></li>

                    </ul>
                </li>
                <?php endif; ?>

                <?php if(check_access(Auth::user()->id,'student','_show')==1): ?>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-clipboard-check"></i> <span> Student </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo e(route('student.index')); ?>">Student List</a></li>
                    </ul>
                </li>
                <?php endif; ?>


                <?php if(check_access(Auth::user()->id,'consultant','_show')==1): ?>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-clipboard-check"></i> <span> Consultant </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo e(route('admin_consultant')); ?>">Consultant List</a></li>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if(check_access(Auth::user()->id,'consultant','_show')==1): ?>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-clipboard-check"></i> <span> Apply Online </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo e(route('applied-consultant')); ?>">Online Consultant List</a></li>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if(check_access(Auth::user()->id,'guide','_show')==1): ?>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-clipboard-check"></i> <span> Guide </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <?php if(check_access(Auth::user()->id,'guide','_show')==1): ?>
                        <li><a href="<?php echo e(route('guide.index')); ?>">Guide List</a></li>
                        <?php endif; ?>
                        <?php if(check_access(Auth::user()->id,'guide','_create')==1): ?><li><a href="<?php echo e(route('guide.create')); ?>">Add Guide</a></li><?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>



                <?php if(check_access(Auth::user()->id,'pages','_show')==1): ?>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-clipboard-check"></i> <span> Pages </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo e(route('dynamicPages')); ?>">Pages List</a></li>
                    </ul>
                </li>
                <?php endif; ?>
                <?php if(check_access(Auth::user()->id,'blog','_show')==1): ?>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-clipboard-check"></i> <span> Articles </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <?php if(check_access(Auth::user()->id,'blog','_show')==1): ?>
                        <li><a href="<?php echo e(route('blog.index')); ?>">Articles List</a></li>
                        <?php endif; ?>
                        <?php if(check_access(Auth::user()->id,'blog','_create')==1): ?><li><a href="<?php echo e(route('blog.create')); ?>">Add Articles</a></li><?php endif; ?>
                        <?php if(check_access(Auth::user()->id,'category','_show')==1): ?><li><a href="<?php echo e(route('blog-category.index')); ?>">Category List</a></li><?php endif; ?>

                    </ul>
                </li>
                <?php endif; ?>


                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-clipboard-check"></i> <span> Visit Visa </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo e(route('visacountries.index')); ?>">Visa Countries</a></li>
                        <li><a href="<?php echo e(route('visadetails.index')); ?>">Visa Details</a></li>
                    </ul>
                </li>


                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-apps"></i> <span> Events Trigger </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo e(route('events_whatsappbutton')); ?>">Whatsapp Button Clicks</a></li>
                    </ul>
                </li>


                <?php if(check_access(Auth::user()->id,'users','_show')==1 || check_access(Auth::user()->id,'groups','_show')==1 ): ?>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account-multiple"></i> <span> User Management </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <?php if(check_access(Auth::user()->id,'users','_show')==1): ?>
                        <li><a href="<?php echo e(route('users.index')); ?>">Users</a></li>
                        <?php endif; ?>
                        
            </ul>
            </li>
            <?php endif; ?>

            <?php if(check_access(Auth::user()->id,'settings','_show')==1): ?>
            <li>
                <a href="<?php echo e(route('webnetSettings')); ?>"><i class="mdi mdi-settings"></i> <span> Settings </span> </a>
            </li>
            <?php endif; ?>
            <?php if(check_access(Auth::user()->id,'additionals','_show')==1): ?>
            <li class="menu-title">Additionals</li>
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-inbox"></i> <span> Inbox </span> <span class="menu-arrow"></span></a>
                <ul class="list-unstyled">
                    <li><a href="<?php echo e(url('admin/additionals/emails/list/email')); ?>">Contact</a></li>
                    <li><a href="<?php echo e(url('admin/additionals/emails/list/complaint')); ?>">Complaints</a></li>
                </ul>
            </li>
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-inbox"></i> <span> University Contacts </span> <span class="menu-arrow"></span></a>
                <ul class="list-unstyled">
                    <li><a href="<?php echo e(route("universitylog")); ?>">University Logs</a></li>
                    <li><a href="<?php echo e(route("courselog")); ?>">Courses Logs</a></li>
                </ul>
            </li>
            <li>
                <a href="<?php echo e(route('applicationForm.index')); ?>"><i class="mdi mdi-comment-question-outline"></i> <span> Application </span> </a>
            </li>
            <li>
                <a href="<?php echo e(url('admin/conversation')); ?>"><i class="fa fa-comments"></i> <span> Consversations </span> </a>
            </li>
            <li>
                <a href="<?php echo e(route('footerEditor')); ?>"><i class="mdi mdi-table-edit"></i> <span> Footer </span> </a>
            </li>
            <div class="clearfix"></div>
            <?php endif; ?>
            <?php endif; ?>


            <?php if(check_access(Auth::user()->id,'guide','_show')==1): ?>
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-clipboard-check"></i> <span> Guide </span> <span class="menu-arrow"></span></a>
                <ul class="list-unstyled">
                    <?php if(check_access(Auth::user()->id,'guide','_show')==1): ?>
                    <li><a href="<?php echo e(route('guide.index')); ?>">Guide List</a></li>
                    <?php endif; ?>
                    <?php if(check_access(Auth::user()->id,'guide','_create')==1): ?><li><a href="<?php echo e(route('guide.create')); ?>">Add Guide</a></li><?php endif; ?>
                </ul>
            </li>
            <?php endif; ?>

            <?php if(check_access(Auth::user()->id,'blog','_show')==1): ?>
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-clipboard-check"></i> <span> Articles </span> <span class="menu-arrow"></span></a>
                <ul class="list-unstyled">
                    <?php if(check_access(Auth::user()->id,'blog','_show')==1): ?>
                    <li><a href="<?php echo e(route('blog.index')); ?>">Articles List</a></li>
                    <?php endif; ?>
                    <?php if(check_access(Auth::user()->id,'blog','_create')==1): ?><li><a href="<?php echo e(route('blog.create')); ?>">Add Articles</a></li><?php endif; ?>
                    <?php if(check_access(Auth::user()->id,'category','_show')==1): ?><li><a href="<?php echo e(route('blog-category.index')); ?>">Category List</a></li><?php endif; ?>

                </ul>
            </li>
            <?php endif; ?>

            <?php if(check_access(Auth::user()->id,'messages','_show')==1): ?>
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-clipboard-check"></i> <span> Mesaages </span> <span class="menu-arrow"></span></a>
                <ul class="list-unstyled">
                    <?php if(check_access(Auth::user()->id,'messages','_show')==1): ?>
                    <li><a href="<?php echo e(route('get-messages')); ?>">All Messages</a></li>
                    <?php endif; ?>
                    <!-- <?php if(check_access(Auth::user()->id,'messages','_create')==1): ?><li><a href="<?php echo e(route('blog.create')); ?>">Add Articles</a></li><?php endif; ?>
                    <?php if(check_access(Auth::user()->id,'messages','_show')==1): ?><li><a href="<?php echo e(route('blog-category.index')); ?>">Category List</a></li><?php endif; ?> -->

                </ul>
            </li>
            <?php endif; ?>


            </ul>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

        <div class="help-box">
            <h5 class="text-muted m-t-0">For Help ?</h5>
            <p class=""><span class="text-custom">Email:</span> <br /> info@webnet.com.pk</p>
            <p class="m-b-0"><span class="text-custom">Call:</span> <br /> (+92) 307 333 7310</p>
        </div>

    </div>

</div>