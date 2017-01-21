<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$now = Carbon::now();
        for($i=1;$i<10;$i=$i+2) {
        	DB::table('tasks')->insert([
        		'patient_id' => $i,
        		'user_id' => 1,
        		'start' => $now->addDays($i*3),
        		]);
        	DB::table('tasks')->insert([
        		'patient_id' => $i,
        		'user_id' => 1,
        		'start' => $now->addDays($i*3+1),
        		]);
        }
        for($i=2;$i<11;$i=$i+2) {
        	DB::table('tasks')->insert([
        		'patient_id' => $i,
        		'user_id' => 2,
        		'start' => $now->addDays($i*3),
        		]);
        	DB::table('tasks')->insert([
        		'patient_id' => $i,
        		'user_id' => 2,
        		'start' => $now->addDays($i*3+1),
        		]);
        }
    }
}
