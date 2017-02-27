<?php

namespace App\Http\Controllers;

use App\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        $start = Carbon::now()->hour(0)->minute(0)->second(0);
        $end = Carbon::now()->hour(23)->minute(59)->second(59);
        $pending_tasks = Task::with('patient')->whereBetween('expected_at', [$start, $end])->get();
        return view('home', compact('pending_tasks'));
    }
}
