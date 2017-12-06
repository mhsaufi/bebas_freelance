   <!-- Hero -->

  <section class="hero">
    <div class="container text-center">
      <div class="row">
        <div class="col-md-12">
        </div>
      </div>
    </div>

  </section>
  <!-- /Hero -->


  <!-- Header -->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <a href="index.html"><img src="img/logo-nav.png" alt="" title="" /></img></a>
        <!-- Uncomment below if you prefer to use a text image -->
        <!--<h1><a href="#hero">Bell</a></h1>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="active"><a href="{!! url('/home') !!}">Home</a></li>
          <li class="menu-has-children"><a href="">Jobs</a>
            <ul>
              <li><a href="{!! url('/postjob') !!}">Post Jobs</a></li>
              <li><a href="{!! url('/getjob') !!}">Get Jobs</a></li>
              <li><a href="{!! url('/joboverview') !!}">Overview</a></li>
            </ul>
          </li>
          <li><a href="#features">Features</a></li>
          <li><a href="#portfolio">Portfolio</a></li>
          <li><a href="#team">Team</a></li>
          <li><a href="#contact">Contact Us</a></li>
        </ul>
      </nav>
      <!-- #nav-menu-container -->

      <nav id="nav-menu-container pull-left">
        <ul class="nav-menu">
          <li class="menu-has-children"><a href="">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li><a href="#">Drop Down 2</a></li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </header>
  <!-- #header -->