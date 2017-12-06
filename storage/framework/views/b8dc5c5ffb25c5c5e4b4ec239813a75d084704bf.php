<header class="main-header" style="position: fixed;top: 0;width: 100%;">

    <a href="<?php echo url('/home'); ?>" class="logo">
      <span class="logo-lg"><b>BEBAS</b>Platform</span>
    </a>

    <nav class="navbar navbar-static-top">
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <li class="messages-menu <?php if($index == 1){echo "active";} ?>">
            <a href="<?php echo url('/home'); ?>">
              <i class="fa fa-home"></i> Home
            </a>
          </li>

          <li class="dropdown messages-menu <?php if($index == 2){echo "active";} ?>">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-tag"></i> Jobs
            </a>
            <ul class="dropdown-menu">
              <li>
                <ul class="menu">
                  <li>
                    <a href="<?php echo url('/createjob'); ?>">
                      <div class="pull-left">
                        Create Job
                      </div>
                    </a>
                  </li>

                  <li>
                    <a href="<?php echo url('/getjobs'); ?>">
                      <div class="pull-left">
                        Get Jobs
                      </div>
                    </a>
                  </li>

                  <li>
                    <a href="<?php echo url('/myjob'); ?>">
                      <div class="pull-left">
                        My Jobs
                      </div>
                    </a>
                  </li>

                  <li>
                    <a href="<?php echo url('/application'); ?>">
                      <div class="pull-left">
                        Applications
                      </div>
                    </a>
                  </li>
                  
                </ul>
              </li>
            </ul>
          </li>

          <li class="messages-menu <?php if($index == 6){echo "active";} ?>">
            <a href="<?php echo url('/manage'); ?>">
              <i class="fa fa-bars"></i> Manage
            </a>
          </li>

          <li class="messages-menu <?php if($index == 4){echo "active";} ?>">
            <a href="<?php echo url('/portfolio'); ?>">
              <i class="fa fa-briefcase"></i> Portfolio
            </a>
          </li>

          <li class="messages-menu <?php if($index == 3){echo "active";} ?>">
            <a href="<?php echo url('/inbox'); ?>">
              <i class="fa fa-envelope"></i> Inbox
            </a>
          </li>


          <li class="dropdown user user-menu <?php if($index == 5){echo "active";} ?>">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php if(Auth::user()->img): ?>
                    <span class="circular--landscape--micro" style="background-image: url('<?php echo url('profilepicture/'.Auth::user()->img.'/'.Auth::user()->id); ?>');">
                    </span>
                <?php else: ?>
                    <span class="circular--landscape--micro" style="background-image: url(<?php echo asset('bebas_asset/image/avatar.png'); ?>);"></span>
                <?php endif; ?>
            </a>
            <ul class="dropdown-menu">

              <li class="user-header">
                <center>
                <?php if(Auth::user()->img): ?>
                    <div class="circular--landscape--medium text-center" style="background-image: url('<?php echo url('profilepicture/'.Auth::user()->img.'/'.Auth::user()->id); ?>');">
                    </div>
                <?php else: ?>
                    <div class="circular--landscape--medium text-center" style="background-image: url(<?php echo asset('bebas_asset/image/avatar.png'); ?>);"></div>
                <?php endif; ?>
                </center>
                <p>
                  <?php echo Auth::user()->name; ?> - <?php echo Auth::user()->details; ?>

                  <small>Member since Nov. 2012</small>
                </p>
              </li>

              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo url('/profile'); ?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  
<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
    <?php echo e(csrf_field()); ?>

</form>