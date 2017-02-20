@extends('protocols.protocolLayout')

@section('protocol_content')
<br>
<div class="col-xs-12">
    <div class="panel panel-default  protocol-menu">
    <ul class="containertreeview-menu">
        <li><a href="/protocol_show/{{ 1 }}">Chest Pain</a></li>
        <li><a href="/protocol_show/{{ 2 }}">Congestive Heart Failure</a></li>
        <li><a href="/protocol_show/{{ 3 }}">Diuretic Titration</a></li>
        <li><a href="/protocol_show/{{ 4 }}">Breathing Problem</a></li>
        <li><a href="/protocol_show/{{ 5 }}">Dizziness</a></li>
        <li><a href="/protocol_show/{{ 6 }}">Escalation</a></li>
        <li><a href="/protocol_show/{{ 7 }}">Heart Rate problem</a></li>
    </ul>
    </div>
</div>
@stop
