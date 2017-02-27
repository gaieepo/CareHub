@extends('layouts.admin_template')

@section('content')
@push('stylesheets')
<link href="{{ URL::asset('css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
@endpush


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Patient Management</div>
            <div class="panel-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        {!! implode('<br>', $errors->all()) !!}
                    </div>
                @endif

                <a href="{{ url('patient/create') }}" class="btn btn-lg btn-primary">Create</a>
                <hr>
                <table id="patients" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>                        
                            <th>Name</th>
                            <th>NRIC</th>
                            <th>Complexity</th>
                            <th>Last Updated</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($patients as $patient)
                        <tr id='clickable-row' onclick="window.document.location='{{ url('patient/'.$patient->id) }}';">                        
                            <td style="cursor: pointer;">{{ $patient->name }}</td>
                            <td style="cursor: pointer;">{{ $patient->nric }}</td>
                            <td style="cursor: pointer;">{{ $patient->complexity }}</td>
                            <td style="cursor: pointer;">{{ $patient->updated_at }}</td>
                    
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
    $('#patients').DataTable();
} );
</script>
@endsection
@endsection

