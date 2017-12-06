<?php $index = 3; ?>
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
  		<h3><i class="fa fa-envelope"></i> Mailbox</h3>
  		<br><br>
      <div class="row">
        <div class="col-lg-2 col-md-2 col-xs-12 col-sm-12" style="border-right: 1px solid grey;">
          <button class="btn btn-default">Compose New</button>
          <br><br>
          <p><a href="{!! url('/inbox') !!}"><b>Inbox</b></a></p>
          <p><a href="{!! url('/outbox') !!}">Outbox</a></p>
          
        </div>
        <div class="col-lg-10 col-md-10 col-xs-12 col-sm-12">
          <img src="{!! asset('bebas_asset/image/mail.jpg') !!}">
        </div>
      </div>
  	</div>
  </section>





  @include('layouts.bebas-inner-scripts')

</body>
</html>
