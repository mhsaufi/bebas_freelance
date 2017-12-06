<?php $index = 5; ?>
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
  		<h3><i class="fa fa-card"></i>{!! Auth::user()->name !!}</h3>
  		<hr>

      <div class="row">
        <div class="col-lg-2 col-md-5 col-sm-12 col-xs-12" onclick="editprofile()" style="cursor: pointer;">
            @if(Auth::user()->img)
                <div class="circular--landscape center" style="background-image: url('{!! url('profilepicture/'.Auth::user()->img.'/'.Auth::user()->id) !!}');background-size: cover;background-position: center;">
                </div>
            @else
                <div class="circular--landscape" style="background-image: url({!! asset('bebas_asset/image/avatar.png') !!});background-size: cover;background-position: center;"></div>
            @endif
            <br>
        </div>

        <div class="col-lg-2 col-md-5 col-sm-12 col-xs-12">
            <h3>{!! Auth::user()->details !!}</h3>
            <p>{!! Auth::user()->email !!}</p>
            <p>{!! Auth::user()->matric_no !!}</p>
            <br>
        </div>

        <div class="col-lg-2 col-md-5 col-sm-12 col-xs-12">
          <br><br>
            <small><em>Registered on</em></small>
            <p>{!! $info->created_at !!}</p>
            <br>
        </div>

        <div class="col-lg-2 col-md-5 col-sm-12 col-xs-12">
          <br><br>
            <small><em>Phone</em></small>
            <p>{!! $info->phone !!}</p>
            <br>
        </div>
      </div>
  	</div>
  </section>





  @include('layouts.bebas-inner-scripts')

  <script>
    function editprofile(){
      var url = '{!! url('/editprofile') !!}';
      window.location.replace(url);
    }
  </script>

</body>
</html>
