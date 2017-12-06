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
            <div class="card_login" id="card_login">
                <div class="card-login-header text-center">
                    
                    <h3>Sign In</h3>

                </div>
                <div class="card-login-body">
                    <form action="<?php echo e(route('login')); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>

                        <?php if($errors->has('email')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('email')); ?></strong>
                            </span>
                        <?php endif; ?>
                        <input type="text" name="email" class="form-control" placeholder="email"/><br>
                        <?php if($errors->has('password')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('password')); ?></strong>
                            </span>
                        <?php endif; ?>
                        <input type="password" name="password"/ class="form-control" placeholder="password"><br>

                        <input type="checkbox" name="rememberme"/> Remember Me<br><br>
                        <button class="btn btn-block btn-login">LOGIN</button><br>
                        <p>Don't have account yet? <a href="<?php echo route('register'); ?>">Sign Up</a> now!</p>
                    </form>
                </div>
            </div>
        </center>

        <?php echo $__env->make('layouts.bebas_scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        
        <script>
            $(document).ready(function(){

                $('#card_login').hide();

            });

            function loginform(){

                $('#card_login').toggle('puff','fast');

            }

            function gohome(){

                var home = '<?php echo e(url('/home')); ?>';
                window.location.replace(home);

            }
        </script>
    </body>
</html>
