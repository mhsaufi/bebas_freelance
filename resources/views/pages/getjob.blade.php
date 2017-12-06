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

  @include('layouts.bebas-inner-scripts')

  <script>
    function viewJob(id){
      var url = '{!! url('/viewjob') !!}'+'?job='+id;
      // alert(id);
      window.location.replace(url);
    }
  </script>

</body>
</html>
