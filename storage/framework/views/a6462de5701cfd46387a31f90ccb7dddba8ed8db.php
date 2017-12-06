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
  		<h3>Our Freelancers</h3>
  		<hr>
      <p>Have a great nice view on our freelancers works and their portfolios!</p>
      <br>
      <?php $__currentLoopData = $freelancers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $port): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 portfolio_underlay" 
        style="background-image: url('<?php echo url('portfolios/'.$port->port_id.'/'.$port->port_attach_title); ?>')"
        onclick="viewJob('<?php echo $port->port_id; ?>')">
          <div class="portfolio_overlay text-center">
            <h3><?php echo $port->portfolio_name; ?></h3>
            <hr>
            <p><?php echo $port->email; ?></p>
            <center>
              <?php if($port->img): ?>
                  <span class="circular--landscape--medium text-center" style="background-image: url('<?php echo url('profilepicture/'.$port->img.'/'.$port->id); ?>');">
                  </span>
              <?php else: ?>
                  <span class="circular--landscape--medium text-center" style="background-image: url(<?php echo asset('bebas_asset/image/avatar.png'); ?>);"></span>
              <?php endif; ?>
            </center>
            <!-- <p><?php echo $port->created_at; ?></p> -->
          </div>
        </div>

      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  	</div>

    <?php echo e($freelancers->links()); ?>

  </section>

  <br><br><br><br>
  <hr>



  <?php echo $__env->make('layouts.bebas-inner-scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <script>
    function viewJob(port_id){

      var url = '<?php echo url('/viewportfolio'); ?>'+'?portfolio='+port_id;

      window.location.replace(url);

    }
  </script>

</body>
</html>
