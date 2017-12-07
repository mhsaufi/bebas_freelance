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
  		<h3>Get Jobs</h3>
  		<hr>
      <div class="row">
        <div class="col-lg-4 col-md-9 col-sm-12 col-xs-12">
          <p>Category</p>
          <select class="form-control" name="category" id="category">
            <?php if($cond == 0): ?>
              <option value="0" selected="selected">All</option>
            <?php else: ?>
              <option value="0">All</option>
            <?php endif; ?>

            <?php $__currentLoopData = $job_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($cond == $type->type_id): ?>
              <option value="<?php echo $type->type_id; ?>" selected="selected"><?php echo $type->title; ?></option>
            <?php else: ?>
              <option value="<?php echo $type->type_id; ?>"><?php echo $type->title; ?></option>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>
      </div>
      <br><br>
      <div class="row">

        <?php if($jobs_count != 0): ?>

          <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 job_info_underlay" 
          style="background-image: url('<?php echo url('attachments/'.$job->job_attach_id.'/'.$job->attach_title); ?>')"
          onclick="viewJob('<?php echo $job->job_id; ?>')">
            <div class="job_info_overlay text-center">
              <h3><?php echo $job->job_name; ?></h3>
              <hr>
              <p><?php echo $job->email; ?></p>
              <em><small>posted on</small></em>
              <p><?php echo $job->created_at; ?></p>
            </div>
          </div>

          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php else: ?>

          <h4>No jobs posted yet</h4>

        <?php endif; ?>

      </div>

  	</div>
  </section>

  <br><br><br><br>

  <hr>

  <?php echo $__env->make('layouts.bebas-inner-scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <script>
    function viewJob(id){
      var url = '<?php echo url('/viewjob'); ?>'+'?job='+id;
      // alert(id);
      window.location.replace(url);
    }

    $('#category').change(function(){

      var cond = $('#category :selected').val();

      var url = '<?php echo url('/getjobs'); ?>'+'?category='+cond;

      window.location.replace(url);

    });
  </script>

</body>
</html>
