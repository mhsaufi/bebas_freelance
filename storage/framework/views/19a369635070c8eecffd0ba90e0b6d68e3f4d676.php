<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

        <title>BEBAS</title>

        <?php echo $__env->make('layouts.bebas_sheets', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </head>

    <body class="welcome-bg" style="background-image: url('<?php echo asset('bebas_asset/image/background-bebas.jpg'); ?>')">

        <div class="row text-right" style="padding-right: 30px;">
            <br><br>
            <?php if(auth()->guard()->guest()): ?>
                <button class="btn-bebas" onclick="loginform()">LOGIN</button>
            <?php else: ?>
                <button class="btn-bebas" onclick="gohome()">HOME</button>
            <?php endif; ?>
        </div>
        <center>
            <div class="card_register">
                <div class="card-login-header text-center">
                    
                    <h3>Sign Up</h3>

                </div>
                <div class="card-login-body">
                     <form action="<?php echo e(route('register')); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>

                        <input type="text" class="form-control" placeholder="Name" name="name">
                        <br>
                        <input type="text" class="form-control" placeholder="Describe who you are (eg:web designer,guitarist,graphic designer" name="details">
                        <br>
                        <input type="text" class="form-control" placeholder="Matric Number" name="matric_no">
                        <br>
                        <input type="email" class="form-control" placeholder="Email" name="email" autofocus>
                        <br>
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <br>
                        <input type="number" class="form-control" placeholder="Phone Number" name="phone">
                        <br>
                        
                        <button class="btn btn-login btn-block" type="submit"><i class="fa fa-lock"></i> SIGN UP</button></form>
                        <br>
                        <p>Already have account? <a href="<?php echo e(url('/')); ?>">Sign In</a></p>
                        <hr>
                    </form>
                </div>
            </div>
        </center>

        <?php echo $__env->make('layouts.bebas_scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        
        <script>

            function gohome(){

                var home = '<?php echo e(url('/home')); ?>';
                window.location.replace(home);

            }
        </script>
    </body>
</html>
