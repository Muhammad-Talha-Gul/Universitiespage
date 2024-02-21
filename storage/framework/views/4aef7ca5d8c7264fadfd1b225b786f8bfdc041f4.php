<i class="loader fa fa-refresh fa-spin"></i>

<div class="col-lg-4 col-md-6 col-sm-6">
    <div class="card-box widget-box-one">
        
        <p class="m-0 text-uppercase font-600 font-secondary text-overflow widget-title" title="Orders">Online sessions by Country</p>
        <div class="wigdet-one-content">
            
            <table class="table">
                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($key); ?></td>
                    <td><?php echo e(count($value)); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>
    </div>
</div>
<div class="col-lg-4 col-md-6 col-sm-6">
    <div class="card-box widget-box-one">
        
        <p class="m-0 text-uppercase font-600 font-secondary text-overflow widget-title" title="Orders">Online sessions by Cities</p>
        <div class="wigdet-one-content">
            
            <table class="table">
                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($key); ?></td>
                    <td><?php echo e(count($value)); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>
    </div>
</div>
<div class="col-lg-4 col-md-6 col-sm-6">
    <div class="card-box widget-box-one">
        
        <p class="m-0 text-uppercase font-600 font-secondary text-overflow widget-title" title="Orders">Online sessions by Trafic Sourse</p>
        <div class="wigdet-one-content">
            
            <table class="table">
                <?php $__currentLoopData = $referer_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($key); ?></td>
                    <td><?php echo e(count($value)); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>
    </div>
</div>
<div class="col-lg-4 col-md-6 col-sm-6">
    <div class="card-box widget-box-one">
        
        <p class="m-0 text-uppercase font-600 font-secondary text-overflow widget-title" title="Orders">Online sessions by Social</p>
        <div class="wigdet-one-content">
            
            <table class="table">
                <?php $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($key); ?></td>
                    <td><?php echo e(count($value)); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>
    </div>
</div>
<div class="col-lg-4 col-md-6 col-sm-6">
    <div class="card-box widget-box-one">
        
        <p class="m-0 text-uppercase font-600 font-secondary text-overflow widget-title" title="Orders">Online sessions by Devices</p>
        <div class="wigdet-one-content">
            
            <table class="table">
                <?php $__currentLoopData = $devices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($key); ?></td>
                    <td><?php echo e(count($value)); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>
    </div>
</div>
<div class="col-lg-4 col-md-6 col-sm-6">
    <div class="card-box widget-box-one">
        
        <p class="m-0 text-uppercase font-600 font-secondary text-overflow widget-title" title="Orders">Top visited pages</p>
        <div class="wigdet-one-content">
            
            <table class="table">
                <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><a href="#"><?php echo e($key); ?></a></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    <?php if(isset($sales)): ?>
        var record = <?php echo json_encode(($sales)??''); ?>;
    <?php else: ?>
         var record = [];
    <?php endif; ?>
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Sales');
    data.addColumn('number','Periods');
    for(var k in record){
        var v = record[k];
        data.addRow([k,v]);
      }
    var options = {
      title: 'Total Sales',
      curveType: 'function',
      legend: { position: 'bottom' }
    };

    var chart = new google.visualization.LineChart(document.getElementById('total_sales'));

    chart.draw(data, options);
  }
</script>