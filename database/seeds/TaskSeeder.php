<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;
use App\Patient;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newVer = 0;
        $numPatients = Patient::all()->count();
        for ($i=1; $i <= $numPatients; $i++) {
            $cnt = rand(3, 8);
            $step = 0;
            for ($j=0; $j < $cnt; ++$j) {
                $interval = rand(2, 14);
                $step += $interval;

                $newTask = new App\Task;
                $newTask->patient_id = $i;
                $newTask->action = 'Call';
                $newTask->start = Carbon::now()->addDays($newVer)->addDays($step)->addDays($interval);
                $newTask->save();
            }
            $newVer += rand(10, 20);
        }
    }
}
