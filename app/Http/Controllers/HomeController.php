<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Task;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['test_tasks'] = Task::join('patients', 'patients.id', '=', 'tasks.patient_id')->select('tasks.id', 'patients.name as title', 'start', 'patient_id')->orderBy('start')->get();
        
        foreach ($data['test_tasks'] as $task) {
            $task['url'] = url('patient/'.$task['patient_id']);
        }

        // echo $data['test_tasks'];
        return view('home')->with($data);
        // return view('test')->withTasks($tasks);
        // return view('home')->withPatients(\App\Patient::all()->where('user_id', '=', Auth::user()->id));
        // return view('home')->withPatients(\App\Patient::search('2')->get());
    }
}
