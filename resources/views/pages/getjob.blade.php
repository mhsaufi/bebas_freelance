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
  		<h3>Get Jobs</h3>
  		<hr>
      <div class="row">
        <div class="col-lg-4 col-md-9 col-sm-12 col-xs-12">
          <p>Category</p>
          <select class="form-control" name="category" id="category">
            @if($cond == 0)
              <option value="0" selected="selected">All</option>
            @else
              <option value="0">All</option>
            @endif

            @foreach($job_types as $type)
            @if($cond == $type->type_id)
              <option value="{!! $type->type_id !!}" selected="selected">{!! $type->title !!}</option>
            @else
              <option value="{!! $type->type_id !!}">{!! $type->title !!}</option>
            @endif
            @endforeach
          </select>
        </div>
      </div>
      <br><br>
      <div class="row">

        @if($jobs_count != 0)

          @foreach($jobs as $job)
          <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 job_info_underlay" 
          style="background-image: url('{!! url('attachments/'.$job->job_attach_id.'/'.$job->attach_title) !!}')"
          onclick="viewJob('{!! $job->job_id !!}')">
            <div class="job_info_overlay text-center">
              <h3>{!! $job->job_name !!}</h3>
              <hr>
              <p>{!! $job->email !!}</p>
              <em><small>posted on</small></em>
              <p>{!! $job->created_at !!}</p>
            </div>
          </div>

          @endforeach

        @else

          <h4>No jobs posted yet</h4>

        @endif

      </div>

  	</div>
  </section>

  <br><br><br><br>

  <hr>

  @include('layouts.bebas-inner-scripts')

  <script>
    function viewJob(id){
      var url = '{!! url('/viewjob') !!}'+'?job='+id;
      // alert(id);
      window.location.replace(url);
    }

    $('#category').change(function(){

      var cond = $('#category :selected').val();

      var url = '{!! url('/getjobs') !!}'+'?category='+cond;

      window.location.replace(url);

    });
  </script>

</body>
</html>
