<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
	public function index()
	{
		$page_title = "Task List";
		$tasks = Task::with('patient')->get();
		return view('task.index', compact('page_title', 'tasks'));
	}
}
