<?php

namespace App;

use App\Task;
use Cmgmyr\Messenger\Traits\Messagable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

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

    public function created_tasks()
    {
        return $this->hasMany(Task::class, 'created_by');
    }

    public function marked_tasks()
    {
        return $this->hasMany(Task::class, 'marked_by');
    }

    public function completed_tasks()
    {
        return $this->hasMany(Task::class, 'completed_by');
    }
}
