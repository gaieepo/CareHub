<?php

namespace App\Utils;

use App\Patient;
use App\Task;
use Carbon\Carbon;

class TaskGenerator
{
    private $json;

    public function __construct()
    {
        $this->json = json_decode(file_get_contents(storage_path() . '/json/tier_system.json'), true);
    }

    public function generate(Patient $patient)
    {
        // $this->{'do' . ucfirst($patient->complexity)}($patient);
        if ($patient->complexity == 'basic') {
            $this->doBasic($patient);
        } elseif ($patient->complexity == 'moderate') {
            $this->doModerate($patient);
        } elseif ($patient->complexity == 'complex') {
            $this->doComplex($patient);
        }
    }

    private function doBasic(Patient $patient)
    {
        $call = $this->json['basic']['call'];
        $visit = $this->json['basic']['visit'];
        foreach ($call['hour'] as $hour) {
            $this->addHour($patient, $hour, 'call');
        }
        foreach ($call['week'] as $week) {
            $this->addWeek($patient, $week, 'call');
        }
        foreach ($call['month'] as $month) {
            $this->addMonth($patient, $month, 'call');
        }

        foreach ($visit['hour'] as $hour) {
            $this->addHour($patient, $hour, 'visit');
        }
        foreach ($visit['week'] as $week) {
            $this->addWeek($patient, $week, 'visit');
        }
        foreach ($visit['month'] as $month) {
            $this->addMonth($patient, $month, 'visit');
        }
    }

    private function doModerate(Patient $patient)
    {
        $call = $this->json['moderate']['call'];
        $visit = $this->json['moderate']['visit'];
        foreach ($call['hour'] as $hour) {
            $this->addHour($patient, $hour, 'call');
        }
        foreach ($call['week'] as $week) {
            $this->addWeek($patient, $week, 'call');
        }
        foreach ($call['month'] as $month) {
            $this->addMonth($patient, $month, 'call');
        }

        foreach ($visit['hour'] as $hour) {
            $this->addHour($patient, $hour, 'visit');
        }
        foreach ($visit['week'] as $week) {
            $this->addWeek($patient, $week, 'visit');
        }
        foreach ($visit['month'] as $month) {
            $this->addMonth($patient, $month, 'visit');
        }
    }

    private function doComplex(Patient $patient)
    {
        $call = $this->json['complex']['call'];
        $visit = $this->json['complex']['visit'];
        foreach ($call['hour'] as $hour) {
            $this->addHour($patient, $hour, 'call');
        }
        foreach ($call['week'] as $week) {
            $this->addWeek($patient, $week, 'call');
        }
        foreach ($call['month'] as $month) {
            $this->addMonth($patient, $month, 'call');
        }

        foreach ($visit['hour'] as $hour) {
            $this->addHour($patient, $hour, 'visit');
        }
        foreach ($visit['week'] as $week) {
            $this->addWeek($patient, $week, 'visit');
        }
        foreach ($visit['month'] as $month) {
            $this->addMonth($patient, $month, 'visit');
        }
    }

    private function addHour(Patient $patient, $hour, $action)
    {
        Task::create([
            'patient_id' => $patient->id,
            'action' => $action,
            'expected_at' => Carbon::parse($patient->discharge)->addHours($hour)
        ]);
    }

    private function addWeek(Patient $patient, $week, $action)
    {
        Task::create([
            'patient_id' => $patient->id,
            'action' => $action,
            'expected_at' => Carbon::parse($patient->discharge)->addWeeks($week)
        ]);
    }

    private function addMonth(Patient $patient, $month, $action)
    {
        Task::create([
            'patient_id' => $patient->id,
            'action' => $action,
            'expected_at' => Carbon::parse($patient->discharge)->addMonths($month)
        ]);
    }
}
