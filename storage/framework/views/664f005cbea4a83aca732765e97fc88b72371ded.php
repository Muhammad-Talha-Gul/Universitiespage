<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        
        <!-- Image logo -->
        <a href="<?php echo e(url("/")); ?>" class="logo">
        <span>
        <img style="margin-top: 10px;" class="logo" src="<?php echo e(asset('assets_backend/images/webnet.png')); ?>" alt="" height="30">
        </span>
        <i>
        <img src="<?php echo e(asset('assets_backend/images/webnet-sm.png')); ?>" alt="" height="28">
        </i>
        </a>
    </div>

    <!-- Button mobile view to collapse sidebar menu -->
    <div class="navbar navbar-default" role="navigation">
        <div class="container">

            <!-- Navbar-left -->
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <button class="button-menu-mobile open-left waves-effect">
                        <i class="mdi mdi-menu"></i>
                    </button>
                </li>
                <!--li class="hidden-xs">
                    <form role="search" class="app-search">
                        <input type="text" placeholder="Search..."
                               class="form-control">
                        <a href=""><i class="fa fa-search"></i></a>
                    </form>
                </li-->
                <!--li class="hidden-xs">
                    <a href="#" class="menu-item">New</a>
                </li-->
                <!--li class="dropdown hidden-xs">
                    <a data-toggle="dropdown" class="dropdown-toggle menu-item" href="#" aria-expanded="false">English
                        <span class="caret"></span></a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a href="#">German</a></li>
                        <li><a href="#">French</a></li>
                        <li><a href="#">Italian</a></li>
                        <li><a href="#">Spanish</a></li>
                    </ul>
                </li-->
            </ul>

            <!-- Right(Notification) -->
            <ul class="nav navbar-nav navbar-right">
                 <li>
                    <a href="<?php echo e(url('admin/conversation')); ?>" class="right-menu-item">
                        <i class="fa fa-comment-o"></i>
                        <span class="badge up bg-success getUnReadConversation">0</span>
                    </a>               
                </li>

                <li>
                    <a href="#" class="right-menu-item dropdown-toggle" data-toggle="dropdown">
                        <i class="mdi mdi-bell"></i>
                        <span class="badge up bg-success"><?php echo e(no_user_notification()); ?></span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right dropdown-lg user-list notify-list">
                        <li>
                            <h5>Notifications</h5>
                        </li>
                        <?php $__currentLoopData = unread_notifications2(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $icon = 'mdi mdi-alert-box';
                             if($value->type=='stock') { $icon = 'mdi mdi-chart-bar'; }
                             if($value->type=='order') { $icon = 'mdi mdi-call-received'; }
                             if($value->type=='helping') { $icon = 'mdi mdi-hand-pointing-right'; }
                             if($value->type=='email') { $icon = 'mdi mdi-inbox'; }
                        ?>
                        <li>
                            <a href="<?php echo e(route('notification_detail',$value->id)); ?>" class="user-list-item">
                                <div class="icon bg-info">
                                    <i class="<?php echo e($icon); ?>"></i>
                                </div>
                                <div class="user-desc">
                                    <span class="name"><?php echo e(ucwords($value->meta)); ?></span>
                                    <span class="time"><?php echo e(date_format($value->created_at,'d M Y g:i a')); ?></span>
                                </div>
                            </a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <li class="all-msgs text-center">
                            <p class="m-0"><a href="<?php echo e(route('notifications')); ?>">See all Notification</a></p>
                        </li>
                    </ul>
                </li>

                

                <?php if(Auth::user()->user_type=='webnet'): ?>
                <li>
                    <a href="javascript:void(0);" class="right-bar-toggle right-menu-item">
                        <i class="mdi mdi-settings"></i>
                    </a>
                </li>
                <?php endif; ?>

                <li class="dropdown user-box">
                    <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                        <img src="<?php echo e(asset('assets_backend/images/users/avatar.png')); ?>" alt="user-img" class="img-circle user-img">
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                        <li>
                            <h5>Hi, <?php echo e(Auth::user()->first_name); ?></h5>
                        </li>
                        
                        
                        <li><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                    </ul>
                </li>

            </ul> <!-- end navbar-right -->
            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="role" value="admin">
            </form>
        </div><!-- end container -->
    </div><!-- end navbar -->
</div>