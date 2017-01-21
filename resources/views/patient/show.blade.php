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
          <b>Complexity</b> <a class="pull-right">{{ ($patient->complexity == 1) ? 'basic' : ($patient->complexity == 2 ? 'moderate' : 'complex') }}</a>
        </li>
        <li class="list-group-item">
          <b>Discharge</b> <a class="pull-right">{{ $patient->discharge }}</a>
        </li>
      </ul>
      <a href="{{ route('generateTasks', ['id' => $patient->id, 'complexity' => $patient->complexity]) }}" class="btn btn-primary btn-block"><b>Open Patient Details</b></a>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->

  <!-- About Me Box -->
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">About Me</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

      <p class="text-muted">
        B.S. in Computer Science from the University of Tennessee at Knoxville
      </p>

      <hr>

      <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

      <p class="text-muted">Malibu, California</p>

      <hr>

      <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

      <p>
        <span class="label label-danger">UI Design</span>
        <span class="label label-success">Coding</span>
        <span class="label label-info">Javascript</span>
        <span class="label label-warning">PHP</span>
        <span class="label label-primary">Node.js</span>
      </p>

      <hr>

      <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
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
              <th style="width: 10px">#</th>
              <th>Task</th>
              <th>Users</th>
              <th style="width: 40px">Date</th>
            </tr>
            @foreach ($patient->tasks->where('start', '>=', Carbon\Carbon::today()->toDateString()) as $task)
            <tr>
              <td>{{ $task->id }}.</td>
              <td>{{ $task->action . ' ' . App\Patient::find($task->patient_id)->name }}</td>
              <td>
                <div class="progress progress-xs progress-striped active">
                  <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
                </div>
              </td>
              <td>{{ $task->start }}</td>
            </tr>
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
              <th style="width: 10px">#</th>
              <th>Task</th>
              <th>Users</th>
              <th style="width: 40px">Date</th>
            </tr>
            @foreach ($patient->tasks->where('start', '<', Carbon\Carbon::today()->toDateString()) as $task)
            <tr>
              <td>{{ $task->id }}.</td>
              <td>{{ $task->action . ' ' . App\Patient::find($task->patient_id)->name }}</td>
              <td>
                <div class="progress progress-xs progress-striped active">
                  <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
                </div>
              </td>
              <td>{{ $task->start }}</td>
            </tr>
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