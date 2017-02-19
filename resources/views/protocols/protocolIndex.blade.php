@extends('protocols.protocolLayout')

@section('protocol_content')
<br>
<ul class="containertreeview-menu protocol-menu">
    <li><a href="{{ url('/protocol_1')}}">Chest Pain</a></li>
    <li><a href="{{ url('/protocol_2')}}">Congestive Heart Failure</a></li>
    <li><a href="{{ url('/protocol_3')}}">Diuretic Titration</a></li>
    <li><a href="{{ url('/protocol_4')}}">Breathing Problem</a></li>
    <li><a href="{{ url('/protocol_5')}}">Dizziness</a></li>
    <li><a href="{{ url('/protocol_6')}}">Escalation</a></li>
    <li><a href="{{ url('/protocol_7')}}">Heart Rate problem</a></li>
</ul>
@stop
