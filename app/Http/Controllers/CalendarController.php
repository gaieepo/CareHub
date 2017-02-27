<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Task;

class CalendarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tasks = Task::with('patient')->get();
        $data = [];

        foreach ($tasks as $task) {
            array_push($data, [
                'title' => $task->action . ' ' . $task->patient->name,
                'start' => $task->expected_at
            ]);
        }
        return view('calendar', compact('data'));
    }
}
