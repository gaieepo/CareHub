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
        // $data['test_tasks'] = Task::join('patients', 'patients.id', '=', 'tasks.patient_id')->select('tasks.id', 'patients.name as title', 'start', 'patient_id')->orderBy('start')->get();

        // foreach ($data['test_tasks'] as $task) {
        //     $task['url'] = url('patient/'.$task['patient_id']);
        // }

        $tasks = Task::with('patient')->get();

        return view('calendar', $tasks);
    }
}
