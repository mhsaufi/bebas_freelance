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
  		<h3>My Jobs</h3>
      <hr>
      <h4><i class="fa fa-arrow-circle-down"></i> Taken Jobs</h4>
      @if($taken_count != 0)

      <div class="row">

        @foreach($taken as $take)
          <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 job_info_underlay" 
          style="background-image: url('{!! url('attachments/'.$take->job_attach_id.'/'.$take->attach_title) !!}')"
          onclick="statusJob('{!! $take->job_id !!}')">
            <div class="job_info_overlay text-center">
              @if($take->js_id == 1)
                <div style="background-color: rgba(0,0,50,0.7);color: white;overflow: hidden;margin-bottom: 20px;">
              @endif

              @if($take->js_id == 6)
                <div style="background-color: rgba(0,150,0,0.7);color: white;overflow: hidden;margin-bottom: 20px;">
              @endif

              @if($take->js_id == 2)
                <div style="background-color: rgba(0,180,0,0.7);color: white;overflow: hidden;margin-bottom: 20px;">
              @endif

              @if($take->js_id == 3)
                <div style="background-color: rgba(0,220,0,0.7);color: white;overflow: hidden;margin-bottom: 20px;">
              @endif
              <!-- <div style="background-color: rgba(0,200,0,0.7);color: white;overflow: hidden;margin-bottom: 20px;"> -->
              <!-- <div style="background-color: rgba(200,0,0,0.7);color: white;overflow: hidden;margin-bottom: 20px;"> -->
                <h3>{!! $take->job_name !!}</h3>
              </div>
              <div>
                <p>{!! $take->email !!}</p>
                <em><small>posted on</small></em>
                <p>{!! $take->created_at !!}</p>
              </div>
            </div>
          </div>
        @endforeach

      </div>

      @else

        <img src="{!! asset('bebas_asset/image/empty.png') !!}" width="20%" class="link_image_empty" onclick="getJob()">

      @endif

      <hr>
      <h4><i class="fa fa-arrow-circle-up"></i> Posted Jobs</h4>
      <hr>
      @if($posted_count != 0)

      <div class="row">

        @foreach($posted as $post)
          <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 job_info_underlay" 
          style="background-image: url('{!! url('attachments/'.$post->job_attach_id.'/'.$post->attach_title) !!}')"
          onclick="overviewJob({{ $post->job_id }},{{ $post->js_id }})">
            <div class="job_info_overlay text-center">
              @if($post->js_id == 1)
                <div style="background-color: rgba(0,0,50,0.7);color: white;overflow: hidden;margin-bottom: 20px;">
              @endif

              @if($post->js_id == 6)
                <div style="background-color: rgba(0,150,0,0.7);color: white;overflow: hidden;margin-bottom: 20px;">
              @endif

              @if($post->js_id == 2)
                <div style="background-color: rgba(0,180,0,0.7);color: white;overflow: hidden;margin-bottom: 20px;">
              @endif

              @if($post->js_id == 3)
                <div style="background-color: rgba(0,220,0,0.7);color: white;overflow: hidden;margin-bottom: 20px;">
              @endif
              <!-- <div style="background-color: rgba(0,200,0,0.7);color: white;overflow: hidden;margin-bottom: 20px;"> -->
              <!-- <div style="background-color: rgba(200,0,0,0.7);color: white;overflow: hidden;margin-bottom: 20px;"> -->
                <h3>{!! $post->job_name !!}</h3>
              </div>
              <div>
                <p>{!! $post->email !!}</p>
                <em><small>posted on</small></em>
                <p>{!! $post->created_at !!}</p>
              </div>
            </div>
          </div>
        @endforeach
        
      </div>

      @else

        <img src="{!! asset('bebas_asset/image/empty.png') !!}" width="20%" class="link_image_empty">

      @endif
      <hr>
  	</div>
  </section>





  @include('layouts.bebas-inner-scripts')
  <script>
    function getJob(){
      var url = '{!! url('/getjobs') !!}';
      window.location.replace(url)
    }
    function overviewJob(job_id,js_id){

      var url;

      if(js_id == 1){
        url = '{!! url('/joboverview') !!}'+'?job='+job_id;
      }
      if(js_id == 6 || js_id == 3){
        url = '{!! url('/progressoverview') !!}'+'?job='+job_id;
      }

      window.location.replace(url);
    }

    function statusJob(job_id){
      var url = '{!! url('/jobstatus') !!}'+'?job='+job_id;
      window.location.replace(url);
    }
  </script>
</body>
</html>
