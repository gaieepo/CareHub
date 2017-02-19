@extends('layouts.admin_template')

@section('content')
  @push('stylesheets')
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/css/jquery.wizard.css') }}" rel="stylesheet">
    <style type="text/css">
      .protocol-menu {
        padding-left: 60px;
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
      .checkboxgroup > ul > li {
        list-style-type: none;
      }
      .checkboxgroup > ul > label {
        color: red;
      }
      .checkboxgroup input[type=checkbox]:checked + sublabel label {
        color: #f00000;
      }
    </style>
  @endpush

  @push('scripts')
    <script src="{{ URL::asset('js/jquery.wizard.js') }}"></script>
  @endpush

  @yield('protocol_content')

@stop
