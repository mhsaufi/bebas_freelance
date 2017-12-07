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
  		<h3><a href="{!! url('/home') !!}">Home</a> > {!! $portfolio->portfolio_name !!} </h3>
  		<hr>
      <div class="row">
        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12">

           @if($portfolio->img)
                <div class="circular--landscape text-center" style="background-image: url('{!! url('profilepicture/'.$portfolio->img.'/'.$portfolio->id) !!}');">
                </div>
            @else
                <div class="circular--landscape text-center" style="background-image: url({!! asset('bebas_asset/image/avatar.png') !!});"></div>
            @endif

        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <?php $unrated_value = 5 - $portfolio->rating;  $j = 1;?>
          <div style="margin-right: 10px;color: grey;">
              @for($i=0;$i<$portfolio->rating;$i++)
                  <span><i class="fa fa-star fa-2x rate rate-checked"></i></span>
                  <?php  $j++; ?>
              @endfor

              @for($k=0;$k<$unrated_value;$k++)
                  <span><i class="fa fa-star fa-2x rate"></i></span>
                  <?php  $j++; ?>
              @endfor
          </div>
          <h4><i class="fa fa-user"></i> {{ $portfolio->email }}</h4>
          <h4><i class="fa fa-briefcase"></i> {{ $portfolio->portfolio_name }} </h4>
          <h4><i class="fa fa-phone"></i> {{ $portfolio->phone }} </h4>

        </div>
      </div>
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

  <script src="{!! asset('bebas_asset/js/bebas-rate.js') !!}"></script>
  
  <script>
    $(document).ready(function(){
    });


  </script>

</body>
</html>
