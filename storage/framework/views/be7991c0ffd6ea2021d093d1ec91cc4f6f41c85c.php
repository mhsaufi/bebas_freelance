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
  		<h3><a href="<?php echo url('/myjob'); ?>">My Jobs</a> > <?php echo $job->job_name; ?></h3>
      <br><br>
      <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12" style="border-right: 1px solid #bdbdbd;">

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

        <!-- for rate plugin use -->
        <input type="hidden" name="rate_url" id="rate_url" value="<?php echo e(url('/rateclient')); ?>"/>
        <input type="hidden" name="job_id" id="job_id" value="<?php echo e($job->job_id); ?>"/>
        <input type="hidden" name="user_id" id="user_id" value="<?php echo e($job->job_client); ?>"/>
        <!-- end for rate plugin use -->

        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
              <?php if($job->client_rated == false): ?>
              <div style="margin-right: 10px;color: grey;">
                  <span id="rate-1"><i class="rate fa fa-star fa-2x"></i></span>
                  <span id="rate-2"><i class="rate fa fa-star fa-2x"></i></span>
                  <span id="rate-3"><i class="rate fa fa-star fa-2x"></i></span>
                  <span id="rate-4"><i class="rate fa fa-star fa-2x"></i></span>
                  <span id="rate-5"><i class="rate fa fa-star fa-2x"></i></span>
              </div>
               <?php else: ?>
                    <?php $unrated_value = 5 - $job->client_rated;  $j = 1;?>
                      <div>
                        <?php for($i=0;$i<$job->client_rated;$i++): ?>
                            <span><i class="fa fa-star fa-2x rate rate-checked"></i></span>
                            <?php  $j++; ?>
                        <?php endfor; ?>

                        <?php for($k=0;$k<$unrated_value;$k++): ?>
                            <span><i class="fa fa-star fa-2x rate"></i></span>
                            <?php  $j++; ?>
                        <?php endfor; ?>
                      </div>
                <?php endif; ?>
              <br>
              <button class="btn btn-warning" onclick="issues()"><i class="fa fa-warning"></i> Response Issues</button>

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
        </div>

      </div>

  	</div>
  </section>

  <br><br><br>

  <hr>

  <?php echo $__env->make('layouts.bebas-inner-scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <script src="<?php echo asset('bebas_asset/summernote/summernote.js'); ?>"></script>
  <script src="<?php echo asset('bebas_asset/js/bebas-rate.js'); ?>"></script>

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

    function postissue(job_id){

      var content = $('#summernote').summernote('code');
      var url = '<?php echo url('/postissue'); ?>';

      $.post(url,{content:content,job:job_id},function(){

        location.reload();

      });

    }

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
