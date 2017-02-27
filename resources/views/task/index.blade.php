@extends('layouts.admin_template')

@section('content')
	<div class="row">
	<table class="table table-striped">
		<tr>
			<th>No.</th>
			<th>Name</th>
			<th>NRIC</th>
			<th>Action</th>
			<th>Comments</th>
		</tr>

		<?php $no=1; 
			use Carbon\Carbon;
			$current = Carbon::now();
			$current->hour = 0;
			$current->minute = 0;
			$current->second = 0;
		?>

		

	</table>
</div>
@stop