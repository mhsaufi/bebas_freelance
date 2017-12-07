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
  		<h3><a href="{!! url('/myjob') !!}">My Jobs</a> > {!! $job->job_name !!}</h3>
      <br><br>
      <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12" style="border-right: 1px solid #bdbdbd;overflow: hidden;">

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

        <!-- for rate plugin use -->
        <input type="hidden" name="rate_url" id="rate_url" value="{{ url('/rateclient') }}"/>
        <input type="hidden" name="job_id" id="job_id" value="{{ $job->job_id }}"/>
        <input type="hidden" name="user_id" id="user_id" value="{{ $job->job_client }}"/>
        <!-- end for rate plugin use -->

        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
              @if($job->client_rated == false)
              <div style="margin-right: 10px;color: grey;">
                  <span id="rate-1"><i class="rate fa fa-star fa-2x"></i></span>
                  <span id="rate-2"><i class="rate fa fa-star fa-2x"></i></span>
                  <span id="rate-3"><i class="rate fa fa-star fa-2x"></i></span>
                  <span id="rate-4"><i class="rate fa fa-star fa-2x"></i></span>
                  <span id="rate-5"><i class="rate fa fa-star fa-2x"></i></span>
              </div>
               @else
                    <?php $unrated_value = 5 - $job->client_rated;  $j = 1;?>
                      <div>
                        @for($i=0;$i<$job->client_rated;$i++)
                            <span><i class="fa fa-star fa-2x rate rate-checked"></i></span>
                            <?php  $j++; ?>
                        @endfor

                        @for($k=0;$k<$unrated_value;$k++)
                            <span><i class="fa fa-star fa-2x rate"></i></span>
                            <?php  $j++; ?>
                        @endfor
                      </div>
                @endif

                <br><br>
                <p>This job has been completed</p>
                <br><br>
                <?php

                  if($job->job_final_attach_id != ''){

                    $attach_arr = explode("|",$attachments->attach_title);

                  }

                  $i = 1;

                ?>

                @if($job->job_final_attach_id != '')

                <p>Attchments for {!! $job->job_name !!} : </p>
                <br>
                @foreach($attach_arr as $arr)

                  {{ $i }} - <a href="{{ url('/download/'.$attachments->attach_id.'/'.$arr) }}">{{ $arr }}</a><br><br>

                  <?php  $i++; ?>

                @endforeach

                @endif
        </div>

      </div>

  	</div>
  </section>

  <br><br><br>

  <hr>

  @include('layouts.bebas-inner-scripts')

  <script src="{!! asset('bebas_asset/summernote/summernote.js') !!}"></script>
  <script src="{!! asset('bebas_asset/js/bebas-rate.js') !!}"></script>

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

    function postissue(job_id){

      var content = $('#summernote').summernote('code');
      var url = '{!! url('/postissue') !!}';

      $.post(url,{content:content,job:job_id},function(){

        location.reload();

      });

    }

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
