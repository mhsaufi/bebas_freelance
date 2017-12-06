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
  		<h3><a href="{!! url('/portfolio') !!}">My Portfolio</a> > {!! $portfolio->portfolio_name !!} </h3>
  		<hr>
      <br>
      <img src="{!! url('portfolios/'.$portfolio->port_id.'/'.$portfolio->port_attach_title) !!}" width="100%" style="border-radius: 10px,box-shadow:0 0 6px black;">
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
