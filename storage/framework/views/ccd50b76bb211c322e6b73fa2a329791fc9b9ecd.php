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
  		<h3><a href="<?php echo url('/joboverview?job='); ?><?php echo $job_id; ?>">Overview</a> > <?php echo $user_info->name; ?>'s Portfolio</h3>
  		<hr>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

          <?php if($portfolio_count == 0): ?>

            <h4><?php echo $user_info->name; ?> haven't uploaded any portfolio yet</h4>

          <?php else: ?>

             <?php $__currentLoopData = $portfolios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $port): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 job_info_underlay" 
              style="background-image: url('<?php echo url('portfolios/'.$port->port_id.'/'.$port->port_attach_title); ?>')"
              onclick="viewPortfolio('<?php echo $port->port_id; ?>')">
                <div class="job_info_overlay text-center">
                  <h3><?php echo $port->portfolio_name; ?></h3>
                  <hr>
                  <em><small>posted on</small></em>
                  <p><?php echo $port->created_at; ?></p>
                </div>
              </div>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


          <?php endif; ?>
          
        </div>
      </div>
  	</div>
  </section>

  <?php echo $__env->make('layouts.bebas-inner-scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <script>
    function viewPortfolio(port_id){

      var back1 = '<?php echo url('/joboverview?job='.$job_id); ?>';
      var back2 = '<?php echo url('/userportfolio'); ?>'+'?user=<?php echo $user_info->id; ?>'+'&job=<?php echo $job_id; ?>';

      var url = '<?php echo url('/reviewportfolio'); ?>'+'?port='+port_id+'&back1='+back1+'&back2='+back2;

      window.location.replace(url);

    }
  </script>

</body>
</html>
