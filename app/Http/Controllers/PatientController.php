<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Patient;
use App\Task;

class PatientController extends Controller
{
	public function index()
	{
        $page_title = "Patient List";
		return view('patient.index')->withPatients(Patient::all())->with('page_title', $page_title);
	}

    public function show($id) {
    	return view('patient.show')->withPatient(Patient::find($id))->with('page_title', 'Patient Profile');
    }

    public function create()
    {
    	return view('patient.create');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required',
    		'nric' => 'required|unique:patients',
    		'complexity' => 'required',
    		'discharge' => 'required',
    	]);

    	$patient = new Patient;
    	$patient->name = $request->get('name');
    	$patient->nric = $request->get('nric');
    	// 1(basic), 2(moderate), 3(complex)
    	$patient->complexity = $request->get('complexity');
    	$patient->discharge = Carbon::parse($request->get('discharge'))->format('Y-m-d');

    	if ($patient->save()) {
    		return redirect('patient');
    	} else {
    		return redirect()->back()->withInput()->withErrors('Fails to store patient!!!');
    	}
    }

    // public function edit($id)
    // {
    //     $patient = Patient::find($id);
    //     return view('patient.edit')->with('patient', $patient);
    // }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'complexity' => 'required'
        ]);

        $patient = Patient::findOrFail($id);
        $patient->complexity = $request->get('complexity');

        if ($patient->save()) {
            return redirect()->action('PatientController@show', ['id' => $patient->id]);
        } else {
            return redirect()->back()->withInput()->withErrors('Fails to update!!!');
        }
    }

    public function destroy($id) 
    {
        Patient::find($id)->delete();
        return redirect()->back()->withInput()->withErrors('Delete complete!');
    }

    public function generateTasks($id, $complexity)
    {
        echo 'Not generating any';
        // $patient = Patient::findOrFail($id);
        // $date = Carbon::parse($patient->discharge);
        // $current = $date;

        // if ($patient->complexity == 3) {
                
        //         $task = new Task;
        //         $date->addDays(2);
        //         $task->patient_id = $patient->id;
        //         $task->start = $date;
        //         $task->action = "Call";
        //         $task->author = 1;
        //         $task->save();
        //         $date = $current;

        //         $task = new Task;
        //         $date->addWeeks(1);
        //         $task->patient_id = $patient->id;
        //         $task->start = $date;
        //         $task->action = "Call";
        //         $task->author = 1;
        //         $task->save();
        //         $date = $current;

        //         $task = new Task;
        //         $date->addWeeks(2);
        //         $task->patient_id = $patient->id;
        //         $task->start = $date;
        //         $task->action = "Call";
        //         $task->author = 1;
        //         $task->save();
        //         $date = $current;

        //         $task = new Task;
        //         $date->addWeeks(4);
        //         $task->patient_id = $patient->id;
        //         $task->start = $date;
        //         $task->action = "Call";
        //         $task->author = 1;
        //         $task->save();
        //         $date = $current;

        //         $task = new Task;
        //         $date->addWeeks(6);
        //         $task->patient_id = $patient->id;
        //         $task->start = $date;
        //         $task->action = "Call";
        //         $task->author = 1;
        //         $task->save();
        //         $date = $current;

        //         $task = new Task;
        //         $date->addWeeks(10);
        //         $task->patient_id = $patient->id;
        //         $task->start = $date;
        //         $task->action = "Call";
        //         $task->author = 1;
        //         $task->save();
        //         $date = $current;

        //         $task = new Task;
        //         $date->addMonths(3);
        //         $task->patient_id = $patient->id;
        //         $task->start = $date;
        //         $task->action = "Call";
        //         $task->author = 1;
        //         $task->save();
        //         $date = $current;

        //         $task = new Task;
        //         $date->addMonths(4);
        //         $task->patient_id = $patient->id;
        //         $task->start = $date;
        //         $task->action = "Call";
        //         $task->author = 1;
        //         $task->save();
        //         $date = $current;

        //         $task = new Task;
        //         $date->addMonths(6);
        //         $task->patient_id = $patient->id;
        //         $task->start = $date;
        //         $task->action = "Call";
        //         $task->author = 1;
        //         $task->save();
        //         $date = $current;

        //         $task = new Task;
        //         $date->addMonths(7);
        //         $task->patient_id = $patient->id;
        //         $task->start = $date;
        //         $task->action = "Call";
        //         $task->author = 1;
        //         $task->save();
        //         $date = $current;

        //         $task = new Task;
        //         $date->addMonths(9);
        //         $task->patient_id = $patient->id;
        //         $task->start = $date;
        //         $task->action = "Call";
        //         $task->author = 1;
        //         $task->save();
        //         $date = $current;

        //         $task = new Task;
        //         $date->addMonths(10);
        //         $task->patient_id = $patient->id;
        //         $task->start = $date;
        //         $task->action = "Call";
        //         $task->author = 1;
        //         $task->save();
        //         $date = $current;
        //     }

        //     if ($patient->complexity == 2) {
                
        //         $task = new Task;
        //         $date->addDays(2);
        //         $task->patient_id = $patient->id;
        //         $task->start = $date;
        //         $task->action = "Call";
        //         $task->author = 1;
        //         $task->save();
        //         $date = $current;

        //         $task = new Task;
        //         $date->addWeeks(2);
        //         $task->patient_id = $patient->id;
        //         $task->start = $date;
        //         $task->action = "Call";
        //         $task->author = 1;
        //         $task->save();
        //         $date = $current;

        //         $task = new Task;
        //         $date->addWeeks(4);
        //         $task->patient_id = $patient->id;
        //         $task->start = $date;
        //         $task->action = "Call";
        //         $task->author = 1;
        //         $task->save();
        //         $date = $current;

        //         $task = new Task;
        //         $date->addMonths(3);
        //         $task->patient_id = $patient->id;
        //         $task->start = $date;
        //         $task->action = "Call";
        //         $task->author = 1;
        //         $task->save();
        //         $date = $current;

        //         $task = new Task;
        //         $date->addMonths(6);
        //         $task->patient_id = $patient->id;
        //         $task->start = $date;
        //         $task->action = "Call";
        //         $task->author = 1;
        //         $task->save();
        //         $date = $current;

        //         $task = new Task;
        //         $date->addMonths(10);
        //         $task->patient_id = $patient->id;
        //         $task->start = $date;
        //         $task->action = "Call";
        //         $task->author = 1;
        //         $task->save();
        //         $date = $current;
        //     }

        //     if ($patient->complexity == 1) {
                
        //         $task = new Task;
        //         $date->addDays(2);
        //         $task->patient_id = $patient->id;
        //         $task->start = $date;
        //         $task->action = "Call";
        //         $task->author = 1;
        //         $task->save();
        //         $date = $current;

        //         $task = new Task;
        //         $date->addWeeks(2);
        //         $task->patient_id = $patient->id;
        //         $task->start = $date;
        //         $task->action = "Call";
        //         $task->author = 1;
        //         $task->save();
        //         $date = $current;

        //         $task = new Task;
        //         $date->addWeeks(6);
        //         $task->patient_id = $patient->id;
        //         $task->start = $date;
        //         $task->action = "Call";
        //         $task->author = 1;
        //         $task->save();
        //         $date = $current;

        //         $task = new Task;
        //         $date->addMonths(6);
        //         $task->patient_id = $patient->id;
        //         $task->start = $date;
        //         $task->action = "Call";
        //         $task->author = 1;
        //         $task->save();
        //         $date = $current;

        //         $task = new Task;
        //         $date->addMonths(9);
        //         $task->patient_id = $patient->id;
        //         $task->start = $date;
        //         $task->action = "Call";
        //         $task->author = 1;
        //         $task->save();
        //         $date = $current;
        //     }
    }
}
