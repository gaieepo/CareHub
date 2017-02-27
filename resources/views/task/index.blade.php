@extends('layouts.admin_template')

@section('content')
@push('stylesheets')
<link href="{{ URL::asset('css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
@endpush


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Tasks</div>
            <div class="panel-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        {!! implode('<br>', $errors->all()) !!}
                    </div>
                @endif

               
                <hr>
                <table id="tasks" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Patient Name</th>
                            <th>Patient NRIC</th>
                            <th>Action</th>
                            <th>Expected At</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach ($tasks as $task)
                       
                            <td style="cursor: pointer;">{{ $task->patient->name }}</td>
                            <td style="cursor: pointer;">{{ $task->patient->nric }}</td>
                            <td style="cursor: pointer;">{{ $task->action }}</td>
                            <td style="cursor: pointer;">{{ $task->expected_at }}</td>			
                    
                        </tr>
                    @endforeach  
                    </tbody>
                </table>
                           
            </div>
        </div>
    </div>
</div>
@section('postscript')


<script src="{{ URL::asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('js/dataTables.bootstrap.min.js') }}"></script>
<script>
$(document).ready(function() {
    $('#tasks').DataTable();
} );
</script>
@endsection
@endsection

