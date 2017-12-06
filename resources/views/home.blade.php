<?php $index = 1; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BEBAS</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  @include('layouts.bebas-inner-sheets')

</head>

<body class="hold-transition skin-blue sidebar-mini">
@include('layouts.bebas-inner-header')

  

  <section class="bebas-body">
  	<div class="row">
  		<br><br>
  		<h3>Our Freelancers</h3>
  		<hr>
      <p>Have a great nice view on our freelancers works and their portfolios!</p>
      <br>
      @foreach($freelancers as $port)
        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 portfolio_underlay" 
        style="background-image: url('{!! url('portfolios/'.$port->port_id.'/'.$port->port_attach_title) !!}')"
        onclick="viewJob('{!! $port->port_id !!}')">
          <div class="portfolio_overlay text-center">
            <h3>{!! $port->portfolio_name !!}</h3>
            <hr>
            <p>{!! $port->email !!}</p>
            <center>
              @if($port->img)
                  <span class="circular--landscape--medium text-center" style="background-image: url('{!! url('profilepicture/'.$port->img.'/'.$port->id) !!}');">
                  </span>
              @else
                  <span class="circular--landscape--medium text-center" style="background-image: url({!! asset('bebas_asset/image/avatar.png') !!});"></span>
              @endif
            </center>
            <!-- <p>{!! $port->created_at !!}</p> -->
          </div>
        </div>

      @endforeach
  	</div>

    {{ $freelancers->links() }}
  </section>

  <br><br><br><br>
  <hr>



  @include('layouts.bebas-inner-scripts')

  <script>
    function viewJob(port_id){

      var url = '{!! url('/viewportfolio') !!}'+'?portfolio='+port_id;

      window.location.replace(url);

    }
  </script>

</body>
</html>
