<?php $index = 3; ?>
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
  		<h3><i class="fa fa-envelope"></i> Mailbox</h3>
  		<br><br>
      <div class="row">
        <div class="col-lg-2 col-md-2 col-xs-12 col-sm-12">
          <button class="btn btn-default" onclick="composenew()">Compose New</button>
          <br><br>
          <p><a href="{!! url('/inbox') !!}"><b>Inbox</b></a></p>
          
        </div>
        <div class="col-lg-10 col-md-10 col-xs-12 col-sm-12" style="border-left: 1px solid grey;">
              <p>Send to </p>
              <input type="text" name="email" id="email" class="form-control" placeholder="enter valid email address"/>
              <br>
              <p>Subject</p>
              <input type="text" name="subject" id="subject" class="form-control" placeholder="mail subject"/>
              <br>
              <div id="summernote"></div>
              <br>
              <button class="btn btn-success" onclick="sendmail()">Send</button>
        </div>
      </div>
  	</div>
  </section>


 <center>
    <div class="message_card" id="success_save_job">
      <div id="row">
        <h3>Mail sent!</h3>
        <span style="color: green;"><i class="fa fa-check fa-2x"></i></span>
      </div>
    </div>
  </center>


  @include('layouts.bebas-inner-scripts')

  <script src="{!! asset('bebas_asset/summernote/summernote.js') !!}"></script>

  <script>
     $(document).ready(function(){

      $('#summernote').summernote({
          height: 200
      });

      $('#success_save_job').hide();

    });

    function viewmsg(msg_id){

      var url = '{!! url('/message') !!}'+'?id='+msg_id;

      window.location.replace(url);

    }

    function composenew(){

      var url = '{!! url('/composenew') !!}';

      window.location.replace(url);

    }

    function sendmail(){

      var url = '{!! url('/sendemail') !!}';

      var content = $('#summernote').summernote('code');
      var subject = $('#subject').val();
      var email = $('#email').val();

      if(subject == ''){

        alert('Subject is required');

      }else if(email == ''){

        alert('Email is required');

      }else if(content == ''){

        alert('cannot send empty mail');

      }else{

        $.post(url,{content:content,subject:subject,email:email},function(){

            $('#job_bebas_form').hide('puff','fast');
            $('#success_save_job').show('puff','fast');

            setTimeout(function(){ 
              var redirect = '{{ url('/inbox') }}';
              window.location.replace(redirect); 
            }, 3000);

        });

      }

    }
  </script>

</body>
</html>
