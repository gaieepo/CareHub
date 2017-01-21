<?php

use Illuminate\Database\Seeder;

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
        		'name' => 'Patient '.$i,
        		'user_id' => $i%2+1,
        		]);
        }
    }
}
