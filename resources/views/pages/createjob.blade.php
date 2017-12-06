<?php $index = 2; ?>
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
  <link href="{!! asset('bebas_asset/datepicker2/css/datepicker.css') !!}" rel="stylesheet">
</head>

<body class="hold-transition skin-blue sidebar-mini">
@include('layouts.bebas-inner-header')

  

  <section class="bebas-body">
  	<div class="row">
  		<br><br>
  		<h3>Create new Job</h3>
  		<hr>
      <div class="row" id="job_bebas_form">
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">

          <input type="text" name="job_title" id="job_title" class="form-control" placeholder="New Job Title" />
          <br>
          <!-- Dropzone -->
          <form action="{!! url('/upload_attachment') !!}" id="frmFileUpload" onsubmit="hideButton()" method="post" class="dropzone" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="row">
                  <div class="dz-message">
                      <h3><i class="fa fa-photo"></i> Photos for your job</h3>
                  </div>
                  <div class="fallback">
                      <input name="file" type="file"/>
                  </div>
              </div>
          </form>
          <br>
          <br>
          <div id="summernote"></div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <input type="number" id="job_value" name="job_value" placeholder="Job Price" class="form-control"/>
          <br>
          <input type="hidden" name="attach_id" id="attach_id" value="" />
          <p>Deadline</p>
          <div class="input-group date">
              <input type="text" class="form-control" id="date">
              <div class="input-group-addon">
                  <span class="glyphicon glyphicon-th"></span>
              </div>
          </div><br>
          <label for="job_type">Type</label>
          <select name="job_type" id="job_type" class="form-control">
            @foreach($job_types as $type)
              <option value="{!! $type->type_id !!}">{!! $type->title !!}</option>
            @endforeach
          </select>
          <br>
          <br><br>
          <button class="btn btn-success btn-block" onclick="postJob()">Create this job</button>
        </div>
      </div>
  	</div>
  </section>

  <center>
    <div class="message_card" id="success_save_job">
      <div id="row">
        <h3>Job Successfully Created</h3>
        <span style="color: green;"><i class="fa fa-check fa-2x"></i></span>
      </div>
    </div>
  </center>

  <hr>

  @include('layouts.bebas-inner-scripts')
  <script src="{!! asset('bebas_asset/dropzone/dropzone.js') !!}"></script>
  <script src="{!! asset('bebas_asset/summernote/summernote.js') !!}"></script>
  <script src="{!! asset('bebas_asset/datepicker2/js/bootstrap-datepicker.js') !!}"></script>
  <script>
    $(document).ready(function(){
      $('#summernote').summernote({
          height: 200
      });

      $('#date').datepicker(function(){
          format: 'yyyy-mm-dd'
      });

      $('#success_save_job').hide();

    });

    function postJob(){

      var title = $('#job_title').val();
      var value = $('#job_value').val();
      var attachment = $('#attach_id').val();
      var deadline = $('#date').val();
      var job_type = $('#job_type :selected').val();
      var description = $('#summernote').summernote('code');
      var url = '{!! url('/postnewjob') !!}';

      $.post(url,{title:title,value:value,attachment:attachment,deadline:deadline,job_type:job_type,description:description},function(){

        $('#job_bebas_form').hide('puff','fast');
        $('#success_save_job').show('puff','fast');
        setTimeout(function(){ 
          var redirect = '{{ url('/getjobs') }}';
          window.location.replace(redirect); 
        }, 3000);

      });

    }
  </script>

</body>
</html>
