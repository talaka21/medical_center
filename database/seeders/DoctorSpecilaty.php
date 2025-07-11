<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoctorSpecilaty extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $doctorSpecialties = [
            ['doctor_id' => 12, 'specialty_id' => 1], // Dr.Ahmed - Neurology
            ['doctor_id' => 13, 'specialty_id' => 3],
            ['doctor_id' => 14, 'specialty_id' => 5],
            ['doctor_id' => 15, 'specialty_id' => 4],
            ['doctor_id' => 16, 'specialty_id' => 2],
            ['doctor_id' => 17, 'specialty_id' => 1],
            ['doctor_id' => 18, 'specialty_id' => 6],
            ['doctor_id' => 19, 'specialty_id' => 7],
            ['doctor_id' => 20, 'specialty_id' => 8],
            ['doctor_id' => 21, 'specialty_id' => 9],
            ['doctor_id' => 23, 'specialty_id' => 10], // dr.lama - Pulmonology
        ];

        foreach ($doctorSpecialties as $entry) {
            DB::table('doctor_specialties')->insert([
                'doctor_id' => $entry['doctor_id'],
                'specialty_id' => $entry['specialty_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
