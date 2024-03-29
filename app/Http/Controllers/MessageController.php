<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Carbon\Carbon;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class MessageController extends Controller
{
    public function index()
    {
    	$currentUserId = Auth::user()->id;
    	$threads = Thread::getAllLatest()->get();
    	return view('messenger.index', compact('threads', 'currentUserId'));
    }

    public function show($id)
    {
    	try {
    		$thread = Thread::findOrFail($id);
    	} catch (ModelNotFoundException $e) {
    		Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');
    		return redirect('messages');
    	}

    	$userId = Auth::user()->id;
    	$users = User::whereNotIn('id', $thread->participantsUserIds($userId))->get();

    	$thread->markAsRead($userId);

    	return view('messenger.show', compact('thread', 'users'));
    }

    public function create()
    {
    	$users = User::where('id', '!=', Auth::id())->get();
    	return view('messenger.create', compact('users'));
    }

    public function store()
    {
    	$input = Input::all();

    	$thread = Thread::create([
    		'subject' => $input['subject'],
    		]);

    	// Message
    	Message::create([
    		'thread_id' => $thread->id,
    		'user_id'	=> Auth::user()->id,
    		'body'		=> $input['message'],
    		]);

    	// Sender
    	Participant::create([
    		'thread_id' => $thread->id,
    		'user_id'	=> Auth::user()->id,
    		'last_read'	=> new Carbon,
    		]);

    	// Recipients
    	if (Input::has('recipients')) {
    		$thread->addParticipant($input['recipients']);
    	}

    	return redirect('messages');
    }

    public function update($id)
    {
    	try {
    		$thread = Thread::findOrFail($id);
    	} catch (ModelNotFoundException $e) {
    		Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');
    		return redirect('messages');
    	}

    	$thread->activateAllParticipants();

    	// Message
    	Message::create([
    		'thread_id' => $thread->id,
    		'user_id'	=> Auth::id(),
    		'body'		=> Input::get('message'),
    		]);

    	// Add replier as a participant
    	$participant = Participant::firstOrCreate([
    		'thread_id' => $thread->id,
    		'user_id'	=> Auth::user()->id,
    		]);
    	$participant->last_read = new Carbon;
    	$participant->save();


    	// Recipients
    	if (Input::has('recipients')) {
    		$thread->addParticipant(Input::get('recipients'));
    	}

    	return redirect('messages/' . $id);
    }
}
