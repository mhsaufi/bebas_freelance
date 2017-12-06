<?php $index = 2; ?>
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
  		<h3><a href="{!! url('/joboverview?job=') !!}{!! $job_id !!}">Overview</a> > {!! $user_info->name !!}'s Portfolio</h3>
  		<hr>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

          @if($portfolio_count == 0)

            <h4>{!! $user_info->name !!} haven't uploaded any portfolio yet</h4>

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
      </div>
  	</div>
  </section>

  @include('layouts.bebas-inner-scripts')

  <script>
    function viewPortfolio(port_id){

      var back1 = '{!! url('/joboverview?job='.$job_id) !!}';
      var back2 = '{!! url('/userportfolio') !!}'+'?user={!! $user_info->id !!}'+'&job={!! $job_id !!}';

      var url = '{!! url('/reviewportfolio') !!}'+'?port='+port_id+'&back1='+back1+'&back2='+back2;

      window.location.replace(url);

    }
  </script>

</body>
</html>
