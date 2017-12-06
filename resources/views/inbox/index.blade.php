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
          <button class="btn btn-default" onclick="composenew()">Compose New</button>
          <br><br>
          <p><a href="{!! url('/inbox') !!}"><b>Inbox</b></a></p>
          
        </div>
        <div class="col-lg-10 col-md-10 col-xs-12 col-sm-12">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Sender</th>
                <th>Subject</th>
                <th>Date</th>
              </tr>
            </thead>
            <tbody>
              @foreach($inbox as $msg)
              <?php if($msg->sender == 0){$msg->sender = 'Bebas Platform';} ?>
              @if($msg->msg_status == 1)
                <tr class="msg msg-unread" onclick="viewmsg('{!! $msg->msg_id !!}')">
              @else
                <tr class="msg" onclick="viewmsg('{!! $msg->msg_id !!}')">
              @endif
                  <td>{!! $msg->sender !!}</td>
                  <td>{!! $msg->msg_subject !!}</td>
                  <td>{!! $msg->msg_date !!}</td>
                </tr>

              @endforeach
            </tbody>
          </table>
          {!! $inbox->links() !!}
        </div>
      </div>
  	</div>
  </section>





  @include('layouts.bebas-inner-scripts')

  <script>
    function viewmsg(msg_id){

      var url = '{!! url('/message') !!}'+'?id='+msg_id;

      window.location.replace(url);

    }

    function composenew(){

      var url = '{!! url('/composenew') !!}';

      window.location.replace(url);

    }
  </script>

</body>
</html>
