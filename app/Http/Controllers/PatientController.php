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
        $patients = Patient::all();
		return view('patient.index', compact('page_title', 'patients'));
	}

    public function show($id) {
        $patient = Patient::with('tasks')->find($id);
        $page_title = 'Patient Profile';
    	return view('patient.show', compact('page_title', 'patient'));
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
}
