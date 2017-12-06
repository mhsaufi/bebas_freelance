<?php $index = 2; ?>
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
  		<h3>My Job Application</h3>
  		<hr>

      <div class="row">

        <?php if($application_count != 0): ?>

        <table class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Job Title</th>
              <th>Applied On</th>
              <th>Status</th>
              <th>Remark</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

              <tr>
                <td><?php echo $app->application_id; ?></td>
                <td><?php echo $app->job_name; ?></td>
                <td><?php echo $app->created_at; ?></td>
                <td>
                  <?php if($app->application_status == 1): ?>
                    <button class="btn btn-warning btn-sm">Pending</button>
                  <?php endif; ?>
                </td>
                <td>
                  <?php if($app->application_status == 1): ?>
                    <button class="btn btn-danger btn-sm">Cancel</button>
                  <?php endif; ?>
                </td>
              </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
          </tbody>
        </table>

        <?php else: ?>

          <h4>You are not applying for any jobs yet</h4>

        <?php endif; ?>

      </div>

  	</div>
  </section>

  <?php echo $__env->make('layouts.bebas-inner-scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <script>
  </script>

</body>
</html>
