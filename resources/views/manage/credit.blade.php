<?php $index = 6; ?>
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
  		<h3><i class="fa fa-bars"></i> Manage</h3>
      <br><br>
      <div class="row">

        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12" style="border-right: 1px solid #d7d7d7;">
          <p><a href="{!! url('/manage') !!}" class="active">Debit Statement</a></p>
          <p><a href="{!! url('/managecredit') !!}">Credit Statement <i class="fa fa-caret-right"></i></a></p>
          <p><a href="{!! url('/managejob') !!}">Jobs Manager</a></p>
        </div>

        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
          @if($pending_count == 0 AND $paid_count == 0)
            <p>No credit recorded for any job</p>
          @endif


          @if($pending_count != 0)

            <?php $total = 0; ?>

            <h3> JOB PAYABLE </h3>
            <br><br>
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>PID</th>
                  <th>Job</th>
                  <th>Job Status</th>
                  <th>Client</th>
                  <th>Contact</th>
                  <th class="text-center">Payable</th>
                  <th>Taken Date</th>
                </tr>
              </thead>
              <tbody>
                @foreach($pendings as $pending)
                  <tr>
                    <td>{!! $pending->pay_id !!}</td>
                    <td>{!! $pending->job_name !!}</td>
                    <td>
                      @if($pending->js_id != 3)
                        <button class="btn btn-warning btn-xs">Incomplete</button>
                      @endif
                      @if($pending->js_id == 3)
                        <button class="btn btn-success btn-xs">Complete</button>
                      @endif
                    </td>
                    <td>{!! $pending->name !!}</td>
                    <td>{!! $pending->email !!} / {!! $pending->phone !!}</td>
                    <td class="text-right">{!! $pending->pay_amount !!}</td>
                    <td>{!! $pending->updated_at !!}</td>
                  </tr>
                  <?php $total += $pending->pay_amount; ?>
                @endforeach
                <tr>
                  <th colspan="5" class="text-right"><em>Total Payable</em></th>
                  <th class="text-right">{!! $total !!}</th>
                  <th></th>
                </tr>
              </tbody>
            </table>

          @endif

          

          @if($paid_count != 0)
            <hr>
            <?php $total = 0; ?>
            <h3> PAIDS </h3>
            <br><br>
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>PID</th>
                  <th>Job</th>
                  <th>Job Status</th>
                  <th>Client</th>
                  <th>Contact</th>
                  <th class="text-center">Payable</th>
                  <th>Taken Date</th>
                </tr>
              </thead>
              <tbody>paid
                @foreach($paids as $paid)
                  <tr>
                    <td>{!! $paid->pay_id !!}</td>
                    <td>{!! $paid->job_name !!}</td>
                    <td>
                      @if($paid->js_id != 3)
                        <button class="btn btn-warning btn-xs">Incomplete</button>
                      @endif
                      @if($paid->js_id == 3)
                        <button class="btn btn-success btn-xs">Complete</button>
                      @endif
                    </td>
                    <td>{!! $paid->name !!}</td>
                    <td>{!! $paid->email !!} / {!! $paid->phone !!}</td>
                    <td class="text-right">{!! $paid->pay_amount !!}</td>
                    <td>{!! $paid->updated_at !!}</td>
                  </tr>
                  <?php $total += $paid->pay_amount; ?>
                @endforeach
                <tr>
                  <th colspan="5" class="text-right"><em>Total Earnings</em></th>
                  <th class="text-right">{!! $total !!}</th>
                  <th></th>
                </tr>
              </tbody>
            </table>

          @endif
         
          
        </div>
      </div>
  	</div>
  </section>





  @include('layouts.bebas-inner-scripts')

</body>
</html>
