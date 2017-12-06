<?php $index = 5; ?>
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
  		<h3><i class="fa fa-card"></i><?php echo Auth::user()->name; ?></h3>
  		<hr>

      <div class="row">
        <div class="col-lg-2 col-md-5 col-sm-12 col-xs-12" onclick="editprofile()" style="cursor: pointer;">
            <?php if(Auth::user()->img): ?>
                <div class="circular--landscape center" style="background-image: url('<?php echo url('profilepicture/'.Auth::user()->img.'/'.Auth::user()->id); ?>');background-size: cover;background-position: center;">
                </div>
            <?php else: ?>
                <div class="circular--landscape" style="background-image: url(<?php echo asset('bebas_asset/image/avatar.png'); ?>);background-size: cover;background-position: center;"></div>
            <?php endif; ?>
            <br>
        </div>

        <div class="col-lg-2 col-md-5 col-sm-12 col-xs-12">
            <h3><?php echo Auth::user()->details; ?></h3>
            <p><?php echo Auth::user()->email; ?></p>
            <p><?php echo Auth::user()->matric_no; ?></p>
            <br>
        </div>

        <div class="col-lg-2 col-md-5 col-sm-12 col-xs-12">
          <br><br>
            <small><em>Registered on</em></small>
            <p><?php echo $info->created_at; ?></p>
            <br>
        </div>

        <div class="col-lg-2 col-md-5 col-sm-12 col-xs-12">
          <br><br>
            <small><em>Phone</em></small>
            <p><?php echo $info->phone; ?></p>
            <br>
        </div>
      </div>
  	</div>
  </section>





  <?php echo $__env->make('layouts.bebas-inner-scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <script>
    function editprofile(){
      var url = '<?php echo url('/editprofile'); ?>';
      window.location.replace(url);
    }
  </script>

</body>
</html>
