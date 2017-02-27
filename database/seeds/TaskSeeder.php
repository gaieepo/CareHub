<?php

use App\Patient;
use App\Utils\TaskGenerator;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $generator = new TaskGenerator;

        $patients = Patient::all();
        foreach ($patients as $patient) {
            $generator->generate($patient);
        }
    }
}
