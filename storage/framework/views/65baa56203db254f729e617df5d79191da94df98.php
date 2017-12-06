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
  		<h3>My Jobs</h3>
      <hr>
      <h4><i class="fa fa-arrow-circle-down"></i> Taken Jobs</h4>
      <?php if($taken_count != 0): ?>

      <div class="row">

        <?php $__currentLoopData = $taken; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $take): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 job_info_underlay" 
          style="background-image: url('<?php echo url('attachments/'.$take->job_attach_id.'/'.$take->attach_title); ?>')"
          onclick="statusJob('<?php echo $take->job_id; ?>')">
            <div class="job_info_overlay text-center">
              <?php if($take->js_id == 1): ?>
                <div style="background-color: rgba(0,0,50,0.7);color: white;overflow: hidden;margin-bottom: 20px;">
              <?php endif; ?>

              <?php if($take->js_id == 6): ?>
                <div style="background-color: rgba(0,150,0,0.7);color: white;overflow: hidden;margin-bottom: 20px;">
              <?php endif; ?>

              <?php if($take->js_id == 2): ?>
                <div style="background-color: rgba(0,180,0,0.7);color: white;overflow: hidden;margin-bottom: 20px;">
              <?php endif; ?>

              <?php if($take->js_id == 3): ?>
                <div style="background-color: rgba(0,220,0,0.7);color: white;overflow: hidden;margin-bottom: 20px;">
              <?php endif; ?>
              <!-- <div style="background-color: rgba(0,200,0,0.7);color: white;overflow: hidden;margin-bottom: 20px;"> -->
              <!-- <div style="background-color: rgba(200,0,0,0.7);color: white;overflow: hidden;margin-bottom: 20px;"> -->
                <h3><?php echo $take->job_name; ?></h3>
              </div>
              <div>
                <p><?php echo $take->email; ?></p>
                <em><small>posted on</small></em>
                <p><?php echo $take->created_at; ?></p>
              </div>
            </div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </div>

      <?php else: ?>

        <img src="<?php echo asset('bebas_asset/image/empty.png'); ?>" width="20%" class="link_image_empty" onclick="getJob()">

      <?php endif; ?>

      <hr>
      <h4><i class="fa fa-arrow-circle-up"></i> Posted Jobs</h4>
      <hr>
      <?php if($posted_count != 0): ?>

      <div class="row">

        <?php $__currentLoopData = $posted; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 job_info_underlay" 
          style="background-image: url('<?php echo url('attachments/'.$post->job_attach_id.'/'.$post->attach_title); ?>')"
          onclick="overviewJob('<?php echo $post->job_id; ?>','<?php echo $post->js_id; ?>')">
            <div class="job_info_overlay text-center">
              <?php if($post->js_id == 1): ?>
                <div style="background-color: rgba(0,0,50,0.7);color: white;overflow: hidden;margin-bottom: 20px;">
              <?php endif; ?>

              <?php if($post->js_id == 6): ?>
                <div style="background-color: rgba(0,150,0,0.7);color: white;overflow: hidden;margin-bottom: 20px;">
              <?php endif; ?>

              <?php if($post->js_id == 2): ?>
                <div style="background-color: rgba(0,180,0,0.7);color: white;overflow: hidden;margin-bottom: 20px;">
              <?php endif; ?>

              <?php if($post->js_id == 3): ?>
                <div style="background-color: rgba(0,220,0,0.7);color: white;overflow: hidden;margin-bottom: 20px;">
              <?php endif; ?>
              <!-- <div style="background-color: rgba(0,200,0,0.7);color: white;overflow: hidden;margin-bottom: 20px;"> -->
              <!-- <div style="background-color: rgba(200,0,0,0.7);color: white;overflow: hidden;margin-bottom: 20px;"> -->
                <h3><?php echo $post->job_name; ?></h3>
              </div>
              <div>
                <p><?php echo $post->email; ?></p>
                <em><small>posted on</small></em>
                <p><?php echo $post->created_at; ?></p>
              </div>
            </div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
      </div>

      <?php else: ?>

        <img src="<?php echo asset('bebas_asset/image/empty.png'); ?>" width="20%" class="link_image_empty">

      <?php endif; ?>
      <hr>
  	</div>
  </section>





  <?php echo $__env->make('layouts.bebas-inner-scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <script>
    function getJob(){
      var url = '<?php echo url('/getjobs'); ?>';
      window.location.replace(url)
    }
    function overviewJob(job_id,js_id){

      var url;

      if(js_id == 1){
        url = '<?php echo url('/joboverview'); ?>'+'?job='+job_id;
      }
      if(js_id == 6){
        url = '<?php echo url('/progressoverview'); ?>'+'?job='+job_id;
      }

      window.location.replace(url);
    }

    function statusJob(job_id){
      var url = '<?php echo url('/jobstatus'); ?>'+'?job='+job_id;
      window.location.replace(url);
    }
  </script>
</body>
</html>
