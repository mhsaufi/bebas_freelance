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
  		<h3><a href="{!! url('/joboverview?job=') !!}{!! $job_id !!}">Overview</a> > Accept Application</h3>
  		<hr>

      <p><i class="fa fa-user"></i> <b>{!! $user_info->name !!}</b></p><br>
      <p><i class="fa fa-calendar"></i> <b>{!! $app_info->created_at !!}</b></p><br>
      <p><i class="fa fa-envelope"></i> <b>{!! $user_info->email !!}</b></p><br>

      <p>Remark given : </p>
      <p>{!! $app_info->application_remark !!}</p>

      <br><br>
      <p>Our system will email this user on your acceptance of the application. However, you are advised to directly contact<br>
      this individual to deal and updates on the progress.</p>
      <p>Click this button to accept</p><br><br>
      <button class="btn btn-success" onclick="accept('{!! $app_info->application_id !!}')">Accept</button>
  	</div>
  </section>

  <br><br><hr>

  <div class="accept-job-overlay" id="pitch_dialog" style="display: none;">
    <center>
    <div class="accept-job-overlay-success text-center" id="pitch-success">
      <h3>Application Accepted Successfully!</h3>
      <img src="{!! asset('bebas_asset/image/checkgif.gif') !!}" width="50%">
    </div>
    </center>
  </div>

  @include('layouts.bebas-inner-scripts')

  <script>
    $(document).ready(function(){

      $('#pitch_dialog').hide();
      $('#pitch-success').hide();
    });

    function accept(app_id){

      var url = '{!! url('/confirmaccept') !!}';

      $.post(url,{app_id:app_id},function(){

        $('#pitch_dialog').show('fade','fast');
        $('#pitch-success').show('puff','fast');

        setTimeout(function(){
          var redirect = '{!! url('/myjob') !!}';
          window.location.replace(redirect);
        }, 1700);


      });

    }
  </script>

</body>
</html>
