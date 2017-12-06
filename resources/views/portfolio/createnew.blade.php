<?php $index = 4; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BEBAS</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  @include('layouts.bebas-inner-sheets')

  <link rel="stylesheet" type="text/css" href="{!! asset('bebas_asset/dropzone/dropzone.css') !!}">
  <link rel="stylesheet" type="text/css" href="{!! asset('bebas_asset/summernote/summernote.css') !!}">

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

          <p>New Portfolio Name</p>
          <input type="text" name="port_name" class="form-control" id="port_name" required>
          <br>
          <p>Describe your portfolio</p>
          <div id="summernote"></div>
          <br>
          <p>Attach your portfolio files : </p>
          <!-- Dropzone -->
          <form action="{!! url('/upload_portfolio') !!}" id="frmFileUpload" onsubmit="hideButton()" method="post" class="dropzone" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="row">
                  <div class="dz-message">
                      <h3><i class="fa fa-file"></i> Your portfolio files </h3>
                  </div>
                  <div class="fallback">
                      <input name="file" type="file"/>
                  </div>
              </div>
          </form>
          <input type="hidden" name="attach_id" id="attach_id" value="">
          <br>
          <button class="btn btn-success btn-block" onclick="save_portfolio()">Save</button>
          
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <p><a href="{!! url('/portfolio') !!}"><i class="fa fa-briefcase"></i> My Portfolio</a></p>
          <p><a href="{!! url('/createportfolio') !!}"><i class="fa fa-plus"></i> Create new portfolio</a></p>
          <p><a href="{!! url('/importportfolio') !!}"><i class="fa fa-reply"></i> Import Portfolios</a></p>
        </div>
      </div>
  	</div>
  </section>

  <br><br><br><br>

  <hr>

  <div class="accept-job-overlay" id="pitch_dialog" style="display: none;">
    <center>
    <div class="accept-job-overlay-success text-center" id="pitch-success">
      <h3>New Portfolio Created</h3>
      <img src="{!! asset('bebas_asset/image/checkgif.gif') !!}" width="50%">
    </div>
    </center>
  </div>




  @include('layouts.bebas-inner-scripts')


  <script src="{!! asset('bebas_asset/dropzone/dropzone.js') !!}"></script>
  <script src="{!! asset('bebas_asset/summernote/summernote.js') !!}"></script>

  <script>
    $(document).ready(function(){

      $('#pitch_dialog').hide();
      $('#pitch-success').hide();
      $('#summernote').summernote({
          height: 200
      });
    });

    function save_portfolio(){

      var port_name = $('#port_name').val();
      var description = $('#summernote').summernote('code');
      var port_id = $('#attach_id').val();
      var url = '{!! url('/save_portfolio') !!}';

      $.post(url,{port_id:port_id,port_name:port_name,description:description},function(){

        $('#pitch_dialog').show('fade','fast');
        $('#pitch-success').show('puff','fast');

        setTimeout(function(){
          var redirect = '{!! url('/portfolio') !!}';
          window.location.replace(redirect);
        }, 1700);

      });

    }


  </script>

</body>
</html>
