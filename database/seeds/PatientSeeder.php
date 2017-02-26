<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Patient;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('patients')->truncate();
        factory(Patient::class, 20)->create();
    }
}
