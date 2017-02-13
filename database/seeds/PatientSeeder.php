<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<20;$i++) {
        	DB::table('patients')->insert([
        		'nric' => 'A'.$i*123,
        		'name' => 'Patient_'.$i,
                'complexity' => 1,
                'discharge' => Carbon::now()->toDateTimeString()
        		]);
        }
    }
}
