@extends('layouts.admin_template')

@section('content')
    <div class="box">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="{{URL::to('/')}}">Home</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="{{URL::to('messages')}}">Messages @include('messenger.unread-count')</a></li>
                <li><a href="{{URL::to('messages/create')}}">New Message</a></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </div>
    <div class="row">
        @if (Session::has('error_message'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('error_message') }}
            </div>
        @endif
        @if($threads->count() > 0)
            @foreach($threads as $thread)
            <?php $class = $thread->isUnread($currentUserId) ? 'alert-info' : ''; ?>
            <div class="media alert {{ $class }}">
                <h4 class="media-heading">{!! link_to('messages/' . $thread->id, $thread->subject) !!}</h4>
                <p>{{ $thread->latestMessage->body }}</p>
                <p><small><strong>Creator:</strong> {{ $thread->creator()->name }}</small></p>
                <p><small><strong>Participants:</strong> {{ $thread->participantsString(Auth::id()) }}</small></p>
            </div>
            @endforeach
        @else
            <p>Sorry, no threads.</p>
        @endif
    </div>
@stop