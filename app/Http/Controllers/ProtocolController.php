<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProtocolController extends Controller
{
	public function index()
	{
        $page_title = "Protocol List";
		return view('protocols.protocolIndex') -> with('page_title', $page_title);
	}


/*
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
*/
}
