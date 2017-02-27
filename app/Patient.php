<?php

namespace App;

use App\Task;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public function tasks()
    {
    	return $this->hasMany(Task::class);
    }
}
