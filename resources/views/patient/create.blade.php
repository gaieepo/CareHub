@extends('layouts.admin_template')

@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">Create New Patient</div>
            <div class="panel-body">

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Fails</strong>  to create<br><br>
                        {!! implode('<br>', $errors->all()) !!}
                    </div>
                @endif

				{!! Form::open(['route' => 'patient.store']) !!}
					<div class="form-group">
						{!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
		        		{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter name']) !!}
		        	</div>
					
					<div class="form-group">
						{!! Form::label('nric', 'NRIC', ['class' => 'control-label']) !!}
		        		{!! Form::text('nric', null, ['class' => 'form-control', 'placeholder' => 'Enter NRIC']) !!}
		        	</div>
					
					<div class="form-group">
						{!! Form::label('complexity', 'Complexity', ['class' => 'control-label']) !!}
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

					<div class="form-group">
						{!! Form::label('discharge', 'Discharge Date', ['class' => 'control-label']) !!}
						<div class="input-group date">
							<div class="input-group-addon">
			                    <i class="fa fa-calendar"></i>
			                </div>
		        			{!! Form::text('discharge', null, ['class' => 'form-control pull-right', 'id' => 'datepicker']) !!}
		        		</div>
	        		</div>

	        		<div class="form-group">
	        			{!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
	        		</div>
				{!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('postscript')
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