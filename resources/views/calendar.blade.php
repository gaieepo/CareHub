@extends('layouts.admin_template')

@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                <div id="calendar"></div>
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('postscript')
<script type="text/javascript">
    $(document).ready(function() {
        var date = new Date();
        var d = date.getDate(),
            m = date.getMonth(),
            y = date.getFullYear();

        var data = {!! json_encode($data) !!};

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            buttonText: {
                today: 'Today',
                month: 'Month',
                week: 'Week',
                day: 'Day'
            },
            eventLimit: true,
            events: data
        });
    });
</script>
@endsection
