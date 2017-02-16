@extends('layouts.admin_template')

@section('content')
  @push('stylesheets')
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/css/jquery.wizard.css') }}" rel="stylesheet">
    <style type="text/css">
      .steps-content {
        background: #ffffff;
      }
      .checkboxgroup ul li {
        list-style-type: none;
      }
      .checkboxgroup {

      }
    </style>
  @endpush

  @push('scripts')
    <script src="{{ URL::asset('js/jquery.wizard.js') }}"></script>
  @endpush

  @yield('protocol_content')

@stop
