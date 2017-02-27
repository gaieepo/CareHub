@extends('layouts.admin_template')

@section('content')
<!-- Small boxes (Stat box) -->
<div class="row">
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3>150</h3>

        <p>All Users</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3>53<sup style="font-size: 20px">%</sup></h3>

        <p>All Patients</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3>44</h3>

        <p>All Tasks</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3>65</h3>

        <p>All Messages</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
</div>
<!-- /.row -->
<!-- Main row -->
<div class="row">
  <!-- Left col -->
  <section class="col-lg-7 connectedSortable">
    <!-- Custom tabs (Charts with tabs)-->
    <div class="nav-tabs-custom">
      <!-- Tabs within a box -->
      <ul class="nav nav-tabs pull-right">
        <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
        <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
        <li class="pull-left header"><i class="fa fa-inbox"></i> Statistics</li>
      </ul>
      <div class="tab-content no-padding">
        <!-- Morris chart - Sales -->
        <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
        <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
      </div>
    </div>
    <!-- /.nav-tabs-custom -->


  </section>
  <!-- /.Left col -->
  <!-- right col (We are only adding the ID to make the widgets sortable)-->
  <section class="col-lg-5 connectedSortable">
    <!-- TO DO List -->
    <div class="box box-primary">
      <div class="box-header">
        <i class="ion ion-clipboard"></i>

        <h3 class="box-title">To Do List</h3>

        <div class="box-tools pull-right">
          <ul class="pagination pagination-sm inline">
            <li><a href="#">&laquo;</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">&raquo;</a></li>
          </ul>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <ul class="todo-list">
        @foreach ($pending_tasks as $task)
         <li>
            <!-- drag handle -->
                <span class="handle">
                  <i class="fa fa-ellipsis-v"></i>
                  <i class="fa fa-ellipsis-v"></i>
                </span>
            <!-- checkbox -->
            <input type="checkbox" value="">
            <!-- todo text -->
            <span class="text">{{ ucfirst($task->action) }} {{ $task->patient->name }}</span>
            <!-- Emphasis label -->
            <small class="label label-danger"><i class="fa fa-clock-o"></i> Pending</small>
            <!-- General tools such as edit or delete-->
            <div class="tools">
              <i class="fa fa-edit"></i>
              <i class="fa fa-trash-o"></i>
            </div>
          </li>
        @endforeach
        </ul>
      </div>
      <!-- /.box-body -->
      <div class="box-footer clearfix no-border">
        <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
      </div>
    </div>
    <!-- /.box -->


  </section>
  <!-- right col -->
</div>
<!-- /.row (main row) -->
<div class="row">
  <section class="col-lg-12 connectedSortable">
    <!-- quick email widget -->
    <div class="box box-info">
      <div class="box-header">
        <i class="fa fa-envelope"></i>

        <h3 class="box-title">Quick Email</h3>
        <!-- tools box -->
        <div class="pull-right box-tools">
          <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
        <!-- /. tools -->
      </div>
      <div class="box-body">
        <form action="#" method="post">
          <div class="form-group">
            <input type="email" class="form-control" name="emailto" placeholder="Email to:">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="subject" placeholder="Subject">
          </div>
          <div>
            <textarea class="textarea" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
          </div>
        </form>
      </div>
      <div class="box-footer clearfix">
        <button type="button" class="pull-right btn btn-default" id="sendEmail">Send
          <i class="fa fa-arrow-circle-right"></i></button>
      </div>
    </div>
  </section>
</div>
@endsection

@section('postscript')
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/js/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/js/demo.js"></script>
@endsection
