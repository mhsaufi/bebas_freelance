<?php $index = 3; ?>
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
  		<h3><i class="fa fa-envelope"></i> Mailbox</h3>
  		<br><br>
      <div class="row">
        <div class="col-lg-2 col-md-2 col-xs-12 col-sm-12" style="border-right: 1px solid grey;">
          <button class="btn btn-default" onclick="composenew()">Compose New</button>
          <br><br>
          <p><a href="<?php echo url('/inbox'); ?>"><b>Inbox</b></a></p>
          
        </div>
        <div class="col-lg-10 col-md-10 col-xs-12 col-sm-12">
          
          <button class="btn btn-default" title="back to inbox" onclick="back()"><i class="fa fa-arrow-left"></i></button>
          <br>
          <h4><?php echo $msg->msg_subject; ?></h4>
          <hr>
          <?php echo $msg->msg_content; ?>

          <hr>
        </div>
      </div>
  	</div>
  </section>





  <?php echo $__env->make('layouts.bebas-inner-scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <script>
    function back(){

      var url = '<?php echo url('/inbox'); ?>';

      window.location.replace(url);

    }

    function composenew(){

      var url = '<?php echo url('/composenew'); ?>';

      window.location.replace(url);

    }
  </script>

</body>
</html>
