<?php $index = 4; ?>
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
  		<h3><i class="fa fa-briefcase"></i> Portfolio</h3>
  		<hr>
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">

          @if($portfolio_count == 0)

            <h4>You haven't uploaded any portfolio yet</h4>

          @else

             @foreach($portfolios as $port)
              <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 job_info_underlay" 
              style="background-image: url('{!! url('portfolios/'.$port->port_id.'/'.$port->port_attach_title) !!}')"
              onclick="viewPortfolio('{!! $port->port_id !!}')">
                <div class="job_info_overlay text-center">
                  <h3>{!! $port->portfolio_name !!}</h3>
                  <hr>
                  <em><small>posted on</small></em>
                  <p>{!! $port->created_at !!}</p>
                </div>
              </div>

              @endforeach


          @endif
          
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <p><a href="{!! url('/createportfolio') !!}"><i class="fa fa-plus"></i> Create new portfolio</a></p>
        </div>
      </div>
  	</div>
  </section>





  @include('layouts.bebas-inner-scripts')

  <script>
    
    function viewPortfolio(port_id){

      var url = '{!! url('/viewmyportfolio') !!}'+'?portfolio='+port_id;

      window.location.replace(url);

    }
  </script>

</body>
</html>
