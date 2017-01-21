<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Task;

class TestController extends Controller
{
    public function index()
    {
        $data['test_tasks'] = Task::join('patients', 'patients.id', '=', 'tasks.patient_id')->select('tasks.id', 'patients.name as title', 'start', 'patient_id')->orderBy('start')->get();
        
        foreach ($data['test_tasks'] as $task) {
            $task['url'] = url('patient/'.$task['patient_id']);
        }

        // echo $data['test_tasks'];
        return view('calendar')->with($data);
        // return view('test')->withTasks($tasks);
    }
}