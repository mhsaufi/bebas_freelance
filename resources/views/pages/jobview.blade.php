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
  		<h3><a href="{!! url('/getjobs') !!}">Get Job</a> > {!! $job->job_name !!}</h3>
  		<hr>
      <div class="row">
        <div class="col-lg-2 col-md-3 col-sm-12 col-xs-12">

          <h4><i class="fa fa-tag"></i> {{ $job->title }} </h4>

        </div>
        <div class="col-lg-2 col-md-3 col-sm-12 col-xs-12">
          
          <h4><i class="fa fa-user"></i> {{ $job->email }} </h4>

        </div>
        <div class="col-lg-2 col-md-3 col-sm-12 col-xs-12">
          
          <h4><i class="fa fa-calendar"></i> {{ $job->job_due }} </h4>

        </div>
        <div class="col-lg-6 col-md-3 col-sm-12 col-xs-12 text-right">
          
          <button class="btn btn-success" onclick="accept()"><i class="fa fa-check"></i> Take This Job</button>

        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

          {!! $job->job_details !!}

        </div>
      </div>
      <br>
      <img src="{!! url('attachments/'.$job->job_attach_id.'/'.$job->attach_title) !!}" width="100%">
      <br><br><br>
      <hr>
  	</div>
  </section>

  <div class="accept-job-overlay" id="pitch_dialog">
    <center>
    <div class="accept-job-overlay-form text-left" id="pitch-form">
      <p>Give your best pitch to promote yourself!</p>
      <textarea rows="3" name="pitch" class="form-control" id="pitch"></textarea>
      <br>
      <div class="row text-right" style="padding-right: 20px;">
        <button class="btn btn-danger" onclick="cancel()">cancel</button> 
        <button class="btn btn-success" onclick="pitchaccept()">accept</button>
      </div> 
    </div>

    <div class="accept-job-overlay-success text-center" id="pitch-success">
      <h3>Success</h3>
      <img src="{!! asset('bebas_asset/image/checkgif.gif') !!}" width="50%">
    </div>
    </center>
  </div>



  @include('layouts.bebas-inner-scripts')
  <script>
    $(document).ready(function(){
        $('#pitch-success').hide();
        $('#pitch_dialog').hide();
    });

    function accept(){
      $('#pitch_dialog').show('puff','fast');
    }

    function cancel(){
      $('#pitch_dialog').hide('puff','fast');
    }

    function pitchaccept(){

      var job_id = '{!! $job->job_id !!}';
      var url = '{!! url('/takejob') !!}';
      var remark = $('#pitch').val();

      $.post(url,{job_id:job_id,remark:remark},function(){

        $('#pitch-form').hide();
        $('#pitch-success').show('puff','fast');

        setTimeout(function(){
          var redirect = '{!! url('/getjobs') !!}';
          window.location.replace(redirect);
        }, 1500);

      });

    }
  </script>

</body>
</html>
