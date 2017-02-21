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
      .nested-ul label {
        font-weight: normal;
      }
      .summary-result {
        padding-top: 20px;
        padding-bottom: 20px;
        padding-left: 5px;
        padding-left: 5px;
        margin-top: 20px;
      }
      </style>
  @endpush

  @yield('protocol_content')

  @section('postscript')
    <script src="{{ URL::asset('js/jquery.wizard.js') }}"></script>
    <script>
      jQuery(document).ready(function() {

        //color change for checked/unchecked box
        $('input:checkbox').each(function(){
          var $t = $(this);
          $t.on('change', function(){
            $t.is(':checked') ? $t.parent().css('color','red') : $t.parent().css('color','#636b6f');
          })
        });

        //generate quick summary by clicking complete button
        var quick_summary='';
        $('.finished-btn').on('click', function(){
          quick_summary=''; //clear the string content
          $('input[type=checkbox]:checked').each(function() {
            var $t = $(this);
            quick_summary = quick_summary + '<li>' + $t.parent().text() + '</li>';
          });
          $('.guide-panel').empty().html('<div class="row"><div class="col-xs-8 col-xs-offset-2 panel panel-default summary-result"><ul>' + quick_summary + '</ul></div></div>' + '<div class="row"><div class="col-xs-8 col-xs-offset-2"><span class="btn btn-success pull-right">Copy to Clipboard</span></div></div>');
        });

        //attach href to redirect to protocolIndex page when clicking
        $('.cancel-btn').attr("href", "{{ url('/protocol')}}")

      });
    </script>
  @endsection

@stop
