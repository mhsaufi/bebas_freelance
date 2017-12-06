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
  		<h3><a href="<?php echo url('/myjob'); ?>">My Jobs</a> > <?php echo $job->job_name; ?></h3>
  		<hr>

      <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">

            <img src="<?php echo url('attachments/'.$job->job_attach_id.'/'.$job->attach_title); ?>" width="100%">
            <br>
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                <h4><i class="fa fa-tag"></i> <?php echo e($job->title); ?> </h4>

              </div>
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                
                <h4><i class="fa fa-user"></i> <?php echo e($job->email); ?> </h4>

              </div>
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                
                <h4><i class="fa fa-calendar"></i> <?php echo e($job->job_due); ?> </h4>

              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <?php echo $job->job_details; ?>


              </div>
            </div>
          
        </div>

        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">

            <?php if($application_count != 0): ?>

            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Applicant</th>
                  <th>Applied On</th>
                  <th>View</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                  <tr>
                    <td><?php echo $app->application_id; ?></td>
                    <td><?php echo $app->name; ?></td>
                    <td><?php echo $app->created_at; ?></td>
                    <td>
                      <span style="margin-right: 30px;" class="icon-link" onclick="viewProfile('<?php echo $app->id; ?>')"><i class="fa fa-user" title="Profile"></i> </span>
                      <span class="icon-link" onclick="viewPortfolio('<?php echo $app->id; ?>')"><i class="fa fa-briefcase" title="Portfolio"></i> </span>
                    </td>
                    <td>
                      <?php if($app->application_status == 1): ?>
                        <button class="btn btn-danger btn-sm" onclick="reject('<?php echo $app->application_id; ?>')">Reject</button>
                        <button class="btn btn-success btn-sm" onclick="accept('<?php echo $app->application_id; ?>')">Approve</button>
                      <?php endif; ?>
                    </td>
                  </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
              </tbody>
            </table>

            <?php else: ?>

              <h4>No user applying for this job yet</h4>

            <?php endif; ?>
          
        </div>

      </div>

  	</div>
  </section>

  <br><br><br>

  <hr>

  <?php echo $__env->make('layouts.bebas-inner-scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <script>
    function viewPortfolio(id){

      var url = '<?php echo url('/userportfolio'); ?>'+'?user='+id;

      window.location.replace(url);
    }

    function reject(app_id){

      var url ='<?php echo url('/rejectapp'); ?>';

      $.post(url,{app_id:app_id},function(){

        location.reload();

      });

    }

    function accept(app_id){

      var url = '<?php echo url('/acceptapp'); ?>'+'?ticket='+app_id;

      window.location.replace(url);

    }
  </script>

</body>
</html>
