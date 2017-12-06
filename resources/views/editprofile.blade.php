<?php $index = 5; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BEBAS</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  @include('layouts.bebas-inner-sheets')


  <link rel="stylesheet" type="text/css" href="{!! asset('bebas_asset/dropzone/dropzone.css') !!}">

</head>

<body class="hold-transition skin-blue sidebar-mini">
@include('layouts.bebas-inner-header')

  

  <section class="bebas-body">
  	<div class="row">
  		<br><br>
  		<h3><i class="fa fa-card"></i>{!! Auth::user()->name !!}</h3>
  		<hr>

      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 col-centered">
          <!-- Dropzone -->
          <form action="{!! url('/upload_dp') !!}" id="frmFileUpload" onsubmit="hideButton()" method="post" class="dropzone" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="row">
                  <div class="dz-message">
                      <h3><i class="fa fa-photo fa-3x"></i> </h3>
                  </div>
                  <div class="fallback">
                      <input name="file" type="file"/>
                  </div>
              </div>
          </form>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 col-centered">
          <p>Name</p>
          <input type="text" name="name" id="name" class="form-control" value="{!! Auth::user()->name !!}" />
          <br>
          <p>Email address</p>
          <input type="text" name="email" id="email" class="form-control" value="{!! Auth::user()->email !!}" />
          <br>
          <p>Phone No</p>
          <input type="text" name="phone" id="phone" class="form-control" value="{!! Auth::user()->phone !!}" />
          <br>
          <p>Who are you?</p>
          <input type="text" name="describe" id="describe" class="form-control" value="{!! Auth::user()->details !!}" />
          <br>
          <button class="btn btn-primary" onclick="save()">Save</button>
        </div>
      </div>
  	</div>
  </section>

  <div class="accept-job-overlay" id="pitch_dialog" style="display: none;">
    <center>
    <div class="accept-job-overlay-success text-center" id="pitch-success">
      <h3>Profile updated!</h3>
      <img src="{!! asset('bebas_asset/image/checkgif.gif') !!}" width="50%">
    </div>
    </center>
  </div>

  <br><br><br>
  <hr>

  @include('layouts.bebas-inner-scripts')


  <script src="{!! asset('bebas_asset/dropzone/dropzone.js') !!}"></script>

  <script>
    $(document).ready(function(){

      $('#pitch_dialog').hide();
      $('#pitch-success').hide();

    });

    function save(){

      var name = $('#name').val();
      var email = $('#email').val();
      var phone = $('#phone').val();
      var describe = $('#describe').val();
      var url = '{!! url('/updateprofile') !!}';

      $.post(url,{name:name,email:email,phone:phone,describe:describe},function(){

        $('#pitch_dialog').show('fade','fast');
        $('#pitch-success').show('puff','fast');

        setTimeout(function(){
          var redirect = '{!! url('/home') !!}';
          window.location.replace(redirect);
        }, 1700);

      });

    }
  </script>

</body>
</html>
