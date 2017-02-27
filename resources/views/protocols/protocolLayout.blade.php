@extends('layouts.admin_template')

@section('content')
  @push('stylesheets')
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/jquery.wizard.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/lightbox.min.css') }}" rel="stylesheet">
    <style type="text/css">
      .protocol-menu {
        padding-left: 40px;
      }
      .protocol-menu li {
        font-size: 120%;
        padding-top: 10px;
      }

      .important-color {
        color: #FF0000;
      }
      .attention-color {
        color: #3c8dbc;
      }
      .steps-content {
        background: #ffffff;
      }
      .steps-content {
        padding-left: 2%;
        padding-right: 2%;
        padding-top: 1%;
        padding-bottom: 1%;
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
      .summary-btn-panel {
        padding-right: 0;
      }
      </style>
  @endpush

  @yield('protocol_content')

  @section('postscript')
    <script src="{{ URL::asset('js/jquery.wizard.js') }}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.4.0/clipboard.min.js"></script>
    <script src="{{ URL::asset('js/lightbox.min.js') }}"></script>
    <script>
      jQuery(document).ready(function() {

        //color change for checked/unchecked box
        $('input:checkbox').each(function(){
          var $t = $(this);
          $t.on('change', function(){
            $t.is(':checked') ? $t.parent().css('color','red') : $t.parent().css('color','#636b6f');
          })
        });

        //check the parent checkbox if any sublist is checked
        $('.nested-ul input[type=checkbox]').each(function(){
          var $el = $(this);
          $el.on('change', function(){
            var len = $('.nested-ul input[type=checkbox]:checked').length;
            if(len) {
              $('#ntul-parent').prop('checked', true);
              $('#ntul-parent').parent().css('color', 'red');
            } else {
              $('#ntul-parent').prop('checked', false);
              $('#ntul-parent').parent().css('color', '#636b6f');
            }
          })
        });

        //generate quick summary by clicking complete button
        var quick_summary='';
        $('.finished-btn').on('click', function(){
          window.getSelection().removeAllRanges();
          quick_summary=''; //clear the string content
          $('input[type=checkbox]:checked').each(function() {
            var $t = $(this);
            quick_summary = quick_summary + '<li>' + $t.parent().text() + '</li>';
          });
          $('.container-fluid').empty().html('<div class="row1"><div id="content" class="col-xs-8 col-xs-offset-2 panel panel-default summary-result"><ul>' + quick_summary + '</ul></div></div>' + '<div class="row2"><div class="col-xs-8 col-xs-offset-2 summary-btn-panel"><div class="pull-right"><span class="btn btn-success" data-clipboard-target="#content">Copy to Clipboard</span><span>&nbsp&nbsp&nbsp</span><a class="btn btn-default" href="{{ url('/protocol')}}">Cancel</a></div></div></div>');

        });

        //Copy to clickboard JH
        var clipboard = new Clipboard('.btn-success');

        clipboard.on('success', function(e) {
          console.log(e);
          window.getSelection().removeAllRanges();
        });

        clipboard.on('error', function(e) {
          console.log(e);
        });

        //attach href to redirect to protocolIndex page when clicking
        $('.cancel-btn').attr("href", "{{ url('/protocol')}}")

      });
    </script>
    
  @endsection

@stop
