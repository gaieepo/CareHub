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

		@foreach ($patients as $patient)
		<tr>
			<?php
				$date = $patient->discharge;
				$date = Carbon::parse($date);
				$flag = 0;
				$temp = $date;
				if ($current <= $date) { //if they are still inside hospital
					continue;
				}
					//if they have been discharged, check complexity and actual scheduling 

					if (($patient->complexity) == 3) {
						switch($current) {
							case $date->addDays(2): $flag = 1; $date = $temp; break;
							case $date->addWeeks(1): $flag = 1; $date = $temp; break;
							case $date->addWeeks(2): $flag = 1; $date = $temp; break;
							case $date->addWeeks(4): $flag = 1; $date = $temp; break;
							case $date->addWeeks(6): $flag = 1; $date = $temp; break;
							case $date->addWeeks(10): $flag = 1; $date = $temp; break;
							case $date->addMonths(3): $flag = 1; $date = $temp; break;
							case $date->addMonths(4): $flag = 1; $date = $temp; break;
							case $date->addMonths(6): $flag = 1; $date = $temp; break;
							case $date->addMonths(7): $flag = 1; $date = $temp; break;
							case $date->addMonths(9): $flag = 1; $date = $temp; break;
							case $date->addMonths(10): $flag = 1; $date = $temp; break;
							default: $flag = 0; break;
						};
					}

					if (($patient->complexity) == 2) {
						switch($current) {
							case $date->addDays(2): $flag = 1; $date = $temp; break;
							case $date->addWeeks(2): $flag = 1; $date = $temp; break;
							case $date->addWeeks(4): $flag = 1; $date = $temp; break;
							case $date->addMonths(3): $flag = 1; $date = $temp; break;
							case $date->addMonths(6): $flag = 1; $date = $temp; break;
							case $date->addMonths(10): $flag = 1; $date = $temp; break;
							default: $flag = 0; break;
						};
					}

					if (($patient->complexity) == 1) {
						switch($current) {
							case $date->addDays(2): $flag = 1; $date = $temp; break;
							case $date->addWeeks(2): $flag = 1; $date = $temp; break;
							case $date->addWeeks(6): $flag = 1; $date = $temp; break;
							case $date->addMonths(6): $flag = 1; $date = $temp; break;
							case $date->addMonths(9): $flag = 1; $date = $temp; break;
							default: $flag = 0; break;
						};
					}

					if ($flag == 1) {
						$date_2 = $patient->postpone_date; 
						$date_2 = Carbon::parse($date_2);
						//if his postponed date after today, continue
						if ($date_2 > $current) {
							continue;
						}
					}
					if ($flag == 0) { 
						$date_2 = $patient->postpone_date; 
						$date_2 = Carbon::parse($date_2);
						//if his postponed date is not today, continue
						if ($current != $date_2) {
							continue;
						}
					}

					$href = "http://localhost/nuh/resources/views/".$patient->name.".xlsx";
			?>
			<td>{{ $no++ }}</td>
			<td>{{ $patient->name }}
				<form class="" method="post">
					<a href="{{$href}}" class="btn btn-primary">View profile</a>
				</form>
			</td>
			<td>{{ $patient->nric }}</td>
			<td>
				<form class="" method="post">
					<a href="{{ route('patient.edit',$patient->id) }}" class="btn btn-danger">Postpone</a>
					<a href="{{ route('patient.show',$patient->id) }}" class="btn btn-primary">Completed</a>
				</form>
			</td>
			<td id="cid_164" class="form-input-wide jf-required">
	          <textarea id="input_164" class="form-textarea" name="q164_iWent" cols="50" rows="6" data-component="textarea"></textarea>
	        </td>
		</tr>
		@endforeach

	</table>
</div>
@stop