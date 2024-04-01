<h4 class="m-t-0 header-title"><b>Course List</b></h4>
    <table id="datatable" class="table hover yajra-datatable">
        <thead>
        <tr>
            <th>Course Name</th>
            <th>University Name</th>
            <th>Subject</th>
            <th>Qualification</th>
            <th>Popular</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody class="mc">
        <?php if(count($data) > 0): ?>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($value->name); ?></td>
                <td><?php echo e((!empty($value->university))?$value->university->name:''); ?></td>
                <td><?php echo e(($value->subject->name)??''); ?></td>
                <td><?php echo e((singleQualification($value->qualification) !== null)?singleQualification($value->qualification)->title:''); ?></td>
                <td valign="middle">
                    <div class="form-group">
                        <input id="comment_Approvel<?php echo e($value->id); ?>" class="mark_featured" onclick="popular('<?php echo e($value->id); ?>')" switch="primary" data-id="<?php echo e($value->university_id); ?>" type="checkbox" <?php if($value->popular == 1): ?> checked="checked" <?php endif; ?>>
                        <label for="comment_Approvel<?php echo e($value->id); ?>" data-on-label="Yes" data-off-label="No"></label>
                        <span class="loader"></span>
                    </div>
                </td>
                <td><?php echo e($value->created_at); ?></td>
                <td>
                    <?php if(check_access(Auth::user()->id,'course','_edit')==1): ?><a href="<?php echo e(url('admin/course/'.$value->id.'/edit')); ?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                    <?php endif; ?>
                    <?php if(check_access(Auth::user()->id,'course','_delete')==1): ?><a class="btn btn-danger btn-xs"  onclick="deleteit(<?php echo e($value->id); ?>)"><i class="fa fa-trash"></i></a>
                    <form action="<?php echo e(route('course.destroy',$value['id'])); ?>" method="POST" id="delete-form-<?php echo e($value->id); ?>">
                        <input type="hidden" name="_method" value="DELETE">
                        <?php echo e(csrf_field()); ?>

                    </form>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    
                <div> <!-- by sadam -->
                    
                    <?php 
                    if($xmlCourses)
                    { 
                        
                        $baseURL = "https://www.universitiespage.com/";
                        $string = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
                        
                        foreach($xmlCourses as $slug)
                        { 
                            $string .= '<url>';
                            $string .= '<loc>'.$baseURL.'courses/'.(isset($slug->id)? $slug->id : '').'</loc>';
                            $string .= '<lastmod>'.date('Y-m-d').'</lastmod>';
                            $string .= '</url>';
                            
                        }
                        
                        $string .='</urlset>';
                        file_put_contents("course_sitemap.xml", $string);
                    
                    }
                   ?>
                </div> <!-- end by sadam -->
<?php echo e($data->links()); ?>

        <?php endif; ?>

        <?php if(count($uni) > 0): ?>
        <?php $__currentLoopData = $uni; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <?php $__currentLoopData = $value->courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($val->name); ?></td>
                <td><?php echo e((!empty($value->name))?$value->name:''); ?></td>
                <td><?php echo e(($val->subject->name)??''); ?></td>
                <td><?php echo e((singleQualification($val->qualification) !== null)?singleQualification($val->qualification)->title:''); ?></td>
                <td valign="middle">
                    <div class="form-group">
                        <input id="comment_Approvel<?php echo e($val->id); ?>" class="mark_featured" onclick="popular('<?php echo e($val->id); ?>')" switch="primary" data-id="<?php echo e($value->university_id); ?>" type="checkbox" <?php if($value->popular == 1): ?> checked="checked" <?php endif; ?>>
                        <label for="comment_Approvel<?php echo e($val->id); ?>" data-on-label="Yes" data-off-label="No"></label>
                        <span class="loader"></span>
                    </div>
                </td>
                <td><?php echo e($val->created_at); ?></td>
                <td>
                    <?php if(check_access(Auth::user()->id,'course','_edit')==1): ?><a href="<?php echo e(url('admin/course/'.$val->id.'/edit')); ?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                    <?php endif; ?>
                    <?php if(check_access(Auth::user()->id,'course','_delete')==1): ?><a class="btn btn-danger btn-xs"  onclick="deleteit(<?php echo e($val->id); ?>)"><i class="fa fa-trash"></i></a>
                    <form action="<?php echo e(route('course.destroy',$value['id'])); ?>" method="POST" id="delete-form-<?php echo e($val->id); ?>">
                        <input type="hidden" name="_method" value="DELETE">
                        <?php echo e(csrf_field()); ?>

                    </form>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
    </table>
    <?php echo e($uni->links()); ?>

<?php endif; ?>