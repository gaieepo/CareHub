<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	public function patient()
	{
		return $this->belongsTo('App\Patient', 'patient_id');
	}

    public function assigner() {
        return $this->belongsTo('App\User', 'assigner');
    }

    public function assignee() {
        return $this->belongsTo('App\User', 'assignee');
    }
}
