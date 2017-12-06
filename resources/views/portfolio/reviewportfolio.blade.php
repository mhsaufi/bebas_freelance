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
  		<h3><a href="{!! $back1 !!}">Overview</a> > <a href="{!! $back2 !!}">{!! $portfolio->name !!}'s Portfolio</a> > {!! $portfolio->portfolio_name !!} </h3>
  		<hr>
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">

          <h4><i class="fa fa-briefcase"></i> {{ $portfolio->portfolio_name }} </h4>

        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          
          <h4><i class="fa fa-user"></i> {{ $portfolio->email }}</h4>

        </div>
      </div>
      <br>
      <img src="{!! url('portfolios/'.$portfolio->port_id.'/'.$portfolio->port_attach_title) !!}" width="100%">
      <br>
      <br>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

          {!! $portfolio->port_description !!}

        </div>
      </div>
      <br>
      <br><br><br>
      <hr>
  	</div>
  </section>


  @include('layouts.bebas-inner-scripts')
  <script>
    $(document).ready(function(){
    });


  </script>

</body>
</html>
