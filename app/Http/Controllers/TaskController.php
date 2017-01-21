<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
	// protected 

	public function index()
	{
		return view('task/index')->withTasks(Task::all());
	}

	// public function createUnderComplexity($id, $complexity)
	// {
	// 	if ($complexity == 1) { // basic
	// 		# code...
	// 	} elseif ($complexity == 2) { // moderate
	// 		# code...
	// 	} else { // complex

	// 	}
	// }
}
