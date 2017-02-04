<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public function users()
    {
    	return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function tasks()
    {
    	return $this->hasMany('App\Task');
    }
}
