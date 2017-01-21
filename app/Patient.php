<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Laravel\Scout\Searchable;

class Patient extends Model
{
    use Searchable;

    public function users()
    {
    	return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function tasks()
    {
    	return $this->hasMany('App\Task');
    }
}