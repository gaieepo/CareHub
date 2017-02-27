@extends('layouts.admin_template')

@section('content')
<div class="row">
<div class="col-md-3">
  <!-- Profile Image -->
  <div class="box box-primary">
    <div class="box-body box-profile">
      <img class="profile-user-img img-responsive img-circle" src="{{ asset('bower_components/AdminLTE/dist/img/user4-128x128.jpg') }}" alt="User profile picture">

      <h3 class="profile-username text-center">{{ $patient->name }}</h3>

      <p class="text-muted text-center">High Risk Patient</p>

      <ul class="list-group list-group-unbordered">
        <li class="list-group-item">
          <b>NRIC</b> <a class="pull-right">{{ $patient->nric }}</a>
        </li>
        <li class="list-group-item">
          <b>Complexity</b> <a class="pull-right">{{ $patient->complexity }}</a>
        </li>
        <li class="list-group-item">
          <b>Discharge</b> <a class="pull-right">{{ $patient->discharge }}</a>
        </li>
      </ul>
      <a href="#" class="btn btn-primary btn-block"><b>Add Ad-Hoc</b></a>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>
<!-- /.col -->

<div class="col-md-9">
  <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#tasks" data-toggle="tab">Tasks</a></li>
      <li><a href="#settings" data-toggle="tab">Settings</a></li>
      <li><a href="#history" data-toggle="tab">History</a></li>
    </ul>
    <div class="tab-content">

        <div class="active tab-pane" id="tasks">
            <table class="table table-bordered">
            <tr>
              <th>Task</th>
              <th>Expected At</th>
              <th>Marked By</th>
            </tr>
            @foreach ($patient->tasks as $task)
              @if (! $task->completed)
              <tr>
                <td>{{ $task->action . ' ' . $patient->name }}</td>
                <td>{{ $task->expected_at }}</td>
                <td>{{ $task->marked_by }}</td>
              </tr>
              @endif
            @endforeach
            </table>
        </div>

      <div class="tab-pane" id="settings">
        {!! Form::open(['url' => 'patient/' . $patient->id, 'class' => 'form-horizontal']) !!}
          {{ method_field('PUT') }}
          {!! csrf_field() !!}
          <div class="form-group">
            {!! Form::label('complexity', 'Complexity', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
              <div class="radio">
                <label>{!! Form::radio('complexity', 1, true) !!}Basic</label>
              </div>
              <div class="radio">
                <label>{!! Form::radio('complexity', 2) !!}Moderate</label>
              </div>
              <div class="radio">
                <label>{!! Form::radio('complexity', 3) !!}Complex</label>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              {!! Form::submit('Update', ['class' => 'btn btn-danger']) !!}
            </div>
          </div>
          {!! Form::close() !!}
      </div>
      <!-- /.tab-pane -->

      <div class="tab-pane" id="history">
            <table class="table table-bordered">
            <tr>
              <th>Task</th>
              <th>Date</th>
              <th>Completed By</th>
            </tr>
            @foreach ($patient->tasks as $task)
              @if ($task->completed)
              <tr>
                <td>{{ $task->action . ' ' . $patient->name }}</td>
                <td>{{ $task->expected_at }}</td>
                <td>{[ $task->completed_by }}</td>
              </tr>
              @endif
            @endforeach
            </table>
        </div>

    </div>
    <!-- /.tab-content -->
  </div>
  <!-- /.nav-tabs-custom -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
@endsection

@section('postscript')
<script src="{{ asset('bower_components/AdminLTE/dist/js/demo.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
      // date picker
        $('#datepicker').datepicker({
          format: 'yyyy-mm-dd',
            autoclose: true,
        });
    });
</script>
@endsection
