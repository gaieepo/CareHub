<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Zizaco\Entrust\Traits\EntrustUserTrait;
use Cmgmyr\Messenger\Traits\Messagable;

class User extends Authenticatable
{
    use Messagable;
    use Notifiable;
    use EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function assigned_tasks() {
        return $this->hasMany('App\Task', 'id', 'assignee');
    }

    public function created_tasks() {
        return $this->hasMany('App\Task', 'id', 'assigner');
    }
}
