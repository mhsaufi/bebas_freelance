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
  		<h3><a href="<?php echo url('/joboverview?job='); ?><?php echo $job_id; ?>">Overview</a> > Accept Application</h3>
  		<hr>

      <p><i class="fa fa-user"></i> <b><?php echo $user_info->name; ?></b></p><br>
      <p><i class="fa fa-calendar"></i> <b><?php echo $app_info->created_at; ?></b></p><br>
      <p><i class="fa fa-envelope"></i> <b><?php echo $user_info->email; ?></b></p><br>

      <p>Remark given : </p>
      <p><?php echo $app_info->application_remark; ?></p>

      <br><br>
      <p>Our system will email this user on your acceptance of the application. However, you are advised to directly contact<br>
      this individual to deal and updates on the progress.</p>
      <p>Click this button to accept</p><br><br>
      <button class="btn btn-success" onclick="accept('<?php echo $app_info->application_id; ?>')">Accept</button>
  	</div>
  </section>

  <br><br><hr>

  <div class="accept-job-overlay" id="pitch_dialog" style="display: none;">
    <center>
    <div class="accept-job-overlay-success text-center" id="pitch-success">
      <h3>Application Accepted Successfully!</h3>
      <img src="<?php echo asset('bebas_asset/image/checkgif.gif'); ?>" width="50%">
    </div>
    </center>
  </div>

  <?php echo $__env->make('layouts.bebas-inner-scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <script>
    $(document).ready(function(){

      $('#pitch_dialog').hide();
      $('#pitch-success').hide();
    });

    function accept(app_id){

      var url = '<?php echo url('/confirmaccept'); ?>';

      $.post(url,{app_id:app_id},function(){

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
