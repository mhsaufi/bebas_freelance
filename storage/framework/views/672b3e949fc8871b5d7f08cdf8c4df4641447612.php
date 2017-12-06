<?php $index = 1; ?>
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
  		<h3><a href="<?php echo url('/home'); ?>">Home</a> > <?php echo $portfolio->portfolio_name; ?> </h3>
  		<hr>
      <div class="row">
        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12">

           <?php if($portfolio->img): ?>
                <div class="circular--landscape text-center" style="background-image: url('<?php echo url('profilepicture/'.$portfolio->img.'/'.$portfolio->id); ?>');">
                </div>
            <?php else: ?>
                <div class="circular--landscape text-center" style="background-image: url(<?php echo asset('bebas_asset/image/avatar.png'); ?>);"></div>
            <?php endif; ?>

        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          
          <h4><i class="fa fa-user"></i> <?php echo e($portfolio->email); ?></h4>
          <h4><i class="fa fa-briefcase"></i> <?php echo e($portfolio->portfolio_name); ?> </h4>
          <h4><i class="fa fa-phone"></i> <?php echo e($portfolio->phone); ?> </h4>

        </div>
      </div>
      <br>
      <img src="<?php echo url('portfolios/'.$portfolio->port_id.'/'.$portfolio->port_attach_title); ?>" width="100%" style="border-radius: 10px,box-shadow:0 0 6px black;">
      <br>
      <br>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

          <?php echo $portfolio->port_description; ?>


        </div>
      </div>
      <br>
      <br><br><br>
      <hr>
  	</div>
  </section>


  <?php echo $__env->make('layouts.bebas-inner-scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <script>
    $(document).ready(function(){
    });


  </script>

</body>
</html>
