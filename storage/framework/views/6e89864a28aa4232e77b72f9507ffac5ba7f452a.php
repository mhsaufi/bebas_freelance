<?php $index = 6; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BEBAS</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php echo $__env->make('layouts.bebas-inner-sheets', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</head>

<body class="hold-transition skin-blue sidebar-mini">
<?php echo $__env->make('layouts.bebas-inner-header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  

  <section class="bebas-body">
  	<div class="row">
  		<br><br>
  		<h3><i class="fa fa-bars"></i> Manage</h3>
      <br><br>
      <div class="row">

        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12" style="border-right: 1px solid #d7d7d7;">
          <p><a href="<?php echo url('/manage'); ?>" class="active">Debit Statement</a></p>
          <p><a href="<?php echo url('/managecredit'); ?>">Credit Statement <i class="fa fa-caret-right"></i></a></p>
          <p><a href="<?php echo url('/managejob'); ?>">Jobs Manager</a></p>
        </div>

        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
          <?php if($pending_count == 0 AND $paid_count == 0): ?>
            <p>No credit recorded for any job</p>
          <?php endif; ?>


          <?php if($pending_count != 0): ?>

            <?php $total = 0; ?>

            <h3> JOB PAYABLE </h3>
            <br><br>
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>PID</th>
                  <th>Job</th>
                  <th>Job Status</th>
                  <th>Client</th>
                  <th>Contact</th>
                  <th class="text-center">Payable</th>
                  <th>Taken Date</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $pendings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pending): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo $pending->pay_id; ?></td>
                    <td><?php echo $pending->job_name; ?></td>
                    <td>
                      <?php if($pending->js_id != 3): ?>
                        <button class="btn btn-warning btn-xs">Incomplete</button>
                      <?php endif; ?>
                      <?php if($pending->js_id == 3): ?>
                        <button class="btn btn-success btn-xs">Complete</button>
                      <?php endif; ?>
                    </td>
                    <td><?php echo $pending->name; ?></td>
                    <td><?php echo $pending->email; ?> / <?php echo $pending->phone; ?></td>
                    <td class="text-right"><?php echo $pending->pay_amount; ?></td>
                    <td><?php echo $pending->updated_at; ?></td>
                  </tr>
                  <?php $total += $pending->pay_amount; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <th colspan="5" class="text-right"><em>Total Payable</em></th>
                  <th class="text-right"><?php echo $total; ?></th>
                  <th></th>
                </tr>
              </tbody>
            </table>

          <?php endif; ?>

          

          <?php if($paid_count != 0): ?>
            <hr>
            <?php $total = 0; ?>
            <h3> PAIDS </h3>
            <br><br>
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>PID</th>
                  <th>Job</th>
                  <th>Job Status</th>
                  <th>Client</th>
                  <th>Contact</th>
                  <th class="text-center">Payable</th>
                  <th>Taken Date</th>
                </tr>
              </thead>
              <tbody>paid
                <?php $__currentLoopData = $paids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo $paid->pay_id; ?></td>
                    <td><?php echo $paid->job_name; ?></td>
                    <td>
                      <?php if($paid->js_id != 3): ?>
                        <button class="btn btn-warning btn-xs">Incomplete</button>
                      <?php endif; ?>
                      <?php if($paid->js_id == 3): ?>
                        <button class="btn btn-success btn-xs">Complete</button>
                      <?php endif; ?>
                    </td>
                    <td><?php echo $paid->name; ?></td>
                    <td><?php echo $paid->email; ?> / <?php echo $paid->phone; ?></td>
                    <td class="text-right"><?php echo $paid->pay_amount; ?></td>
                    <td><?php echo $paid->updated_at; ?></td>
                  </tr>
                  <?php $total += $paid->pay_amount; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <th colspan="5" class="text-right"><em>Total Earnings</em></th>
                  <th class="text-right"><?php echo $total; ?></th>
                  <th></th>
                </tr>
              </tbody>
            </table>

          <?php endif; ?>
         
          
        </div>
      </div>
  	</div>
  </section>





  <?php echo $__env->make('layouts.bebas-inner-scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</body>
</html>
