@extends('layouts.admin_template')

@section('content')
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

                <table class="table table-striped">
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>NRIC</th>
                    </tr>
                    @foreach ($patients as $patient)
                        <tr>
                            <td>{{ $patient->id }}</td>
                            <td>{{ $patient->name }}
                                <form class="" method="post">
                                    <a href="{{ url('patient/'.$patient->id) }}" class="btn btn-primary">View profile</a>
                                </form>
                            </td>
                            <td>{{ $patient->nric }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection