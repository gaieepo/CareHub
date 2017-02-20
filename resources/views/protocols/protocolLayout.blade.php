@extends('layouts.admin_template')

@section('content')
  @push('stylesheets')
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/jquery.wizard.css') }}" rel="stylesheet">
    <style type="text/css">
      .protocol-menu {
        padding-left: 40px;
      }
      .protocol-menu li {
        font-size: 120%;
        padding-top: 10px;
      }

      .steps-content {
        background: #ffffff;
      }
      .checkboxgroup ul li {
        list-style-type: none;
      }
      .checkboxgroup ul {
        margin-left: 0;
        list-style-position: outside;
      }
      .checkboxgroup ul input {
        margin-right: 1em;
        margin-left: -2em;
        padding-top: 0;
        margin-top: 0;
      }
      .nested-ul label{
        font-weight: normal;
      }
/*
      input[type=checkbox] + label {
        color: mediumpurple;
      }
      input[type=checkbox]:checked + label {
        color: red;
      }
*/
      </style>
  @endpush

  @push('scripts')
    <script src="{{ URL::asset('js/jquery.wizard.js') }}"></script>
  @endpush

  @yield('protocol_content')

@stop
