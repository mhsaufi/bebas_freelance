<?php $index = 2; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BEBAS</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php echo $__env->make('layouts.bebas-inner-sheets', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <link rel="stylesheet" type="text/css" href="<?php echo asset('bebas_asset/dropzone/dropzone.css'); ?>">

</head>

<body class="hold-transition skin-blue sidebar-mini">
<?php echo $__env->make('layouts.bebas-inner-header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  

  <section class="bebas-body">
  	<div class="row">
  		<br><br>
  		<h3><a href="<?php echo url('/jobstatus?job='.$job_id); ?>">Job Status</a> >  Complete Form</h3>
  		<hr>
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
          <p>Attach your portfolio files : (if any)</p>
          <!-- Dropzone -->
          <form action="<?php echo url('/upload_final'); ?>" id="frmFileUpload" method="post" class="dropzone" enctype="multipart/form-data">
              <?php echo e(csrf_field()); ?>

              <div class="row">
                  <div class="dz-message">
                      <h3><i class="fa fa-file"></i> Your attachment files </h3>
                  </div>
                  <div class="fallback">
                      <input name="file" type="file"/>
                  </div>
              </div>
          </form>
          <input type="hidden" name="attach_id" id="attach_id" value="">
          <br>
          <button class="btn btn-success btn-block" onclick="complete()">Complete</button>
          
        </div>
      </div>
  	</div>
  </section>

  <br><br><br><br>

  <hr>

  <div class="accept-job-overlay" id="pitch_dialog" style="display: none;">
    <center>
    <div class="accept-job-overlay-success text-center" id="pitch-success">
      <h3>Congratulations, you are done!</h3>
      <img src="<?php echo asset('bebas_asset/image/checkgif.gif'); ?>" width="50%">
    </div>
    </center>
  </div>

  <?php echo $__env->make('layouts.bebas-inner-scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


  <script src="<?php echo asset('bebas_asset/dropzone/dropzone.js'); ?>"></script>

  <script>
    $(document).ready(function(){

      $('#pitch_dialog').hide();
      $('#pitch-success').hide();
      $('#summernote').summernote({
          height: 200
      });
    });

    function complete(){

      var url = '<?php echo url('/completejob'); ?>';
      var attach_id = $('#attach_id').val();

      $.post(url,{attach_id:attach_id},function(){

        $('#pitch_dialog').show('fade','fast');
        $('#pitch-success').show('puff','fast');

        setTimeout(function(){
          var redirect = '<?php echo url('/myjob'); ?>';
          window.location.replace(redirect);
        }, 1700);

      });

    }


  </script>

</body>
</html>
