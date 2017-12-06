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
  		<h3>My Job Application</h3>
  		<hr>

      <div class="row">

        @if($application_count != 0)

        <table class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Job Title</th>
              <th>Applied On</th>
              <th>Status</th>
              <th>Remark</th>
            </tr>
          </thead>
          <tbody>
            @foreach($applications as $app)

              <tr>
                <td>{!! $app->application_id !!}</td>
                <td>{!! $app->job_name !!}</td>
                <td>{!! $app->created_at !!}</td>
                <td>
                  @if($app->application_status == 1)
                    <button class="btn btn-warning btn-sm">Pending</button>
                  @endif
                </td>
                <td>
                  @if($app->application_status == 1)
                    <button class="btn btn-danger btn-sm">Cancel</button>
                  @endif
                </td>
              </tr>

            @endforeach
            
          </tbody>
        </table>

        @else

          <h4>You are not applying for any jobs yet</h4>

        @endif

      </div>

  	</div>
  </section>

  @include('layouts.bebas-inner-scripts')

  <script>
  </script>

</body>
</html>
