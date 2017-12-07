<?php $index = 2; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BEBAS</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  @include('layouts.bebas-inner-sheets')

  <link rel="stylesheet" type="text/css" href="{!! asset('bebas_asset/summernote/summernote.css') !!}">

</head>

<body class="hold-transition skin-blue sidebar-mini">
@include('layouts.bebas-inner-header')

  

  <section class="bebas-body">
  	<div class="row">
  		<br><br>
  		<h3><a href="{!! url('/myjob') !!}">My Job</a> > {!! $job->job_name !!}</h3>

      <div class="row">

        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12" style="border-right: 1px solid #bdbdbd;">

          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

              <h4><i class="fa fa-tag"></i> {{ $job->title }} </h4>

            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              
              <h4><i class="fa fa-calendar"></i> {{ $job->job_due }} </h4>

            </div>
            <div class="col-lg-6 col-md-3 col-sm-12 col-xs-12 text-right">
              
              

            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">    
              <h4><i class="fa fa-user"></i> {{ $job->email }} </h4>
            </div>
          </div>

          <br>

          <img src="{!! url('attachments/'.$job->job_attach_id.'/'.$job->attach_title) !!}" width="100%">
          <br><br>

          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

              {!! $job->job_details !!}

            </div>
          </div>
          
        </div>

        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">

            <br><br>
            @if($job->js_id != 3)
            <button class="btn btn-warning" onclick="issues()"><i class="fa fa-warning"></i> Report Issues</button>
            
            @if($job->ps_id == 1)
              <button class="btn btn-primary" onclick="paid('{!! $job->job_id !!}')"><i class="fa fa-check-square"></i> Mark Paid</button>
            @else
              <button class="btn btn-primary" onclick="paid('{!! $job->job_id !!}')" disabled><i class="fa fa-check-square"></i> Mark Paid</button>
            @endif

            <button class="btn btn-success" onclick="complete('{!! $job->job_id !!}')"><i class="fa fa-check"></i> Update Complete</button>

            <br><br>
            <p>Status : <b>In progress</b></p>
            <br><br>
            <div id="summerarea" style="display: none;">
              <div id="summernote"></div>
              <div class="row text-center">
                <button class="btn btn-default" onclick="postissue('{!! $job->job_id !!}')">Post</button>
              </div>
            </div>
            <br>
            <div class="row" style="padding: 0 15px;">
              @if($issue_count == 0)

                <p>No issue arised yet</p>

              @else

                @foreach($issues as $issue)

                  <div>
                    @if($issue->img != '')
                        <span class="circular--landscape--micro" style="background-image: url('{!! url('profilepicture/'.$issue->img.'/'.$issue->id) !!}');">
                        </span>
                    @else
                        <span class="circular--landscape--micro" style="background-image: url({!! asset('bebas_asset/image/avatar.png') !!});"></span>
                    @endif
                    <br>
                    <span><b>{{ $issue->name }}</b></span>
                    <br><br>
                    {!! $issue->issue_content !!}

                  </div>

                @endforeach

              @endif
            </div>

            @else
              <h4>You already finished this job</h4>
            @endif
        </div>

      </div>
      <br><br>
      <hr>
  	</div>
  </section>


  @include('layouts.bebas-inner-scripts')

  <script src="{!! asset('bebas_asset/summernote/summernote.js') !!}"></script>

  <script>
    $(document).ready(function(){

        $('#summernote').summernote({
          height: 200
        });

        $('#summerarea').hide();

    });

    function issues(){

      $('#summerarea').toggle('blind','fast');

    }

    function complete(job_id){

      var url = '{!! url('/markcomplete') !!}'+'?job='+job_id;

      window.location.replace(url);

    }

    function postissue(job_id){

      var content = $('#summernote').summernote('code');
      var url = '{!! url('/postissue') !!}';

      $.post(url,{content:content,job:job_id},function(){

        location.reload();

      });

    }

    function paid(job_id){
      var url = '{!! url('/markpaid') !!}';
      $.post(url,{job:job_id},function(){

        location.reload();

      });

    }
  </script>

</body>
</html>
