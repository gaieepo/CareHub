<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(InitSeeder::class);
        $this->call(PatientSeeder::class);
        $this->call(TaskSeeder::class);
    }
}
