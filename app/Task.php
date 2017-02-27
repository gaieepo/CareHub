<?php

namespace App;

use App\Patient;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	public function patient()
	{
		return $this->belongsTo(Patient::class);
	}

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function marked_by()
    {
        return $this->belongsTo(User::class, 'marked_by');
    }

    public function completed_by()
    {
        return $this->belongsTo(User::class, 'completed_by');
    }
}
