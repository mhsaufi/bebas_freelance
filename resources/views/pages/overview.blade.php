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
  		<h3><a href="{!! url('/myjob') !!}">My Jobs</a> > {!! $job->job_name !!}</h3>
  		<hr>

      <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">

            <img src="{!! url('attachments/'.$job->job_attach_id.'/'.$job->attach_title) !!}" width="100%">
            <br>
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                <h4><i class="fa fa-tag"></i> {{ $job->title }} </h4>

              </div>
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                
                <h4><i class="fa fa-user"></i> {{ $job->email }} </h4>

              </div>
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                
                <h4><i class="fa fa-calendar"></i> {{ $job->job_due }} </h4>

              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                {!! $job->job_details !!}

              </div>
            </div>
          
        </div>

        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">

            @if($application_count != 0)

            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Applicant</th>
                  <th>Applied On</th>
                  <th>View</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($applications as $app)

                  <tr>
                    <td>{!! $app->application_id !!}</td>
                    <td>{!! $app->name !!}</td>
                    <td>{!! $app->created_at !!}</td>
                    <td>
                      <span style="margin-right: 30px;" class="icon-link" onclick="viewProfile('{!! $app->id !!}')"><i class="fa fa-user" title="Profile"></i> </span>
                      <span class="icon-link" onclick="viewPortfolio('{!! $app->id !!}')"><i class="fa fa-briefcase" title="Portfolio"></i> </span>
                    </td>
                    <td>
                      @if($app->application_status == 1)
                        <button class="btn btn-danger btn-sm" onclick="reject('{!! $app->application_id !!}')">Reject</button>
                        <button class="btn btn-success btn-sm" onclick="accept('{!! $app->application_id !!}')">Approve</button>
                      @endif
                    </td>
                  </tr>

                @endforeach
                
              </tbody>
            </table>

            @else

              <h4>No user applying for this job yet</h4>

            @endif
          
        </div>

      </div>

  	</div>
  </section>

  <br><br><br>

  <hr>

  @include('layouts.bebas-inner-scripts')

  <script>
    function viewPortfolio(id){

      var url = '{!! url('/userportfolio') !!}'+'?user='+id;

      window.location.replace(url);
    }

    function reject(app_id){

      var url ='{!! url('/rejectapp') !!}';

      $.post(url,{app_id:app_id},function(){

        location.reload();

      });

    }

    function accept(app_id){

      var url = '{!! url('/acceptapp') !!}'+'?ticket='+app_id;

      window.location.replace(url);

    }
  </script>

</body>
</html>
