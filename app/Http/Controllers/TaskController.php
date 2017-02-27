<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
	public function index()
	{
		$tasks = Task::with('patient')->get();
		return view('task.index', compact('tasks'));
	}
}
