<?php $index = 2; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BEBAS</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php echo $__env->make('layouts.bebas-inner-sheets', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <link rel="stylesheet" type="text/css" href="<?php echo asset('bebas_asset/summernote/summernote.css'); ?>">

</head>

<body class="hold-transition skin-blue sidebar-mini">
<?php echo $__env->make('layouts.bebas-inner-header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  

  <section class="bebas-body">
  	<div class="row">
  		<br><br>
  		<h3><a href="<?php echo url('/myjob'); ?>">My Job</a> > <?php echo $job->job_name; ?></h3>

      <div class="row">

        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12" style="border-right: 1px solid #bdbdbd;">

          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

              <h4><i class="fa fa-tag"></i> <?php echo e($job->title); ?> </h4>

            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              
              <h4><i class="fa fa-calendar"></i> <?php echo e($job->job_due); ?> </h4>

            </div>
            <div class="col-lg-6 col-md-3 col-sm-12 col-xs-12 text-right">
              
              

            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">    
              <h4><i class="fa fa-user"></i> <?php echo e($job->email); ?> </h4>
            </div>
          </div>

          <br>

          <img src="<?php echo url('attachments/'.$job->job_attach_id.'/'.$job->attach_title); ?>" width="100%">
          <br><br>

          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

              <?php echo $job->job_details; ?>


            </div>
          </div>
          
        </div>

        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">

            <br><br>
            <?php if($job->js_id != 3): ?>
            <button class="btn btn-warning" onclick="issues()"><i class="fa fa-warning"></i> Report Issues</button>
            
            <?php if($job->ps_id == 1): ?>
              <button class="btn btn-primary" onclick="paid('<?php echo $job->job_id; ?>')"><i class="fa fa-check-square"></i> Mark Paid</button>
            <?php else: ?>
              <button class="btn btn-primary" onclick="paid('<?php echo $job->job_id; ?>')" disabled><i class="fa fa-check-square"></i> Mark Paid</button>
            <?php endif; ?>

            <button class="btn btn-success" onclick="complete('<?php echo $job->job_id; ?>')"><i class="fa fa-check"></i> Update Complete</button>

            <br><br>
            <p>Status : <b>In progress</b></p>
            <br><br>
            <div id="summerarea" style="display: none;">
              <div id="summernote"></div>
              <div class="row text-center">
                <button class="btn btn-default" onclick="postissue('<?php echo $job->job_id; ?>')">Post</button>
              </div>
            </div>
            <br>
            <div class="row" style="padding: 0 15px;">
              <?php if($issue_count == 0): ?>

                <p>No issue arised yet</p>

              <?php else: ?>

                <?php $__currentLoopData = $issues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $issue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                  <div>
                    <?php if($issue->img != ''): ?>
                        <span class="circular--landscape--micro" style="background-image: url('<?php echo url('profilepicture/'.$issue->img.'/'.$issue->id); ?>');">
                        </span>
                    <?php else: ?>
                        <span class="circular--landscape--micro" style="background-image: url(<?php echo asset('bebas_asset/image/avatar.png'); ?>);"></span>
                    <?php endif; ?>
                    <br>
                    <span><b><?php echo e($issue->name); ?></b></span>
                    <br><br>
                    <?php echo $issue->issue_content; ?>


                  </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              <?php endif; ?>
            </div>

            <?php else: ?>
              <h4>You already finished this job</h4>
            <?php endif; ?>
        </div>

      </div>
      <br><br>
      <hr>
  	</div>
  </section>


  <?php echo $__env->make('layouts.bebas-inner-scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <script src="<?php echo asset('bebas_asset/summernote/summernote.js'); ?>"></script>

  <script>
    $(document).ready(function(){

        $('#summernote').summernote({
          height: 200
        });

        $('#summerarea').hide();

    });

    function issues(){

      $('#summerarea').toggle('blind','fast');

    }

    function complete(job_id){

      var url = '<?php echo url('/markcomplete'); ?>'+'?job='+job_id;

      window.location.replace(url);

    }

    function postissue(job_id){

      var content = $('#summernote').summernote('code');
      var url = '<?php echo url('/postissue'); ?>';

      $.post(url,{content:content,job:job_id},function(){

        location.reload();

      });

    }

    function paid(job_id){
      var url = '<?php echo url('/markpaid'); ?>';
      $.post(url,{job:job_id},function(){

        location.reload();

      });

    }
  </script>

</body>
</html>
