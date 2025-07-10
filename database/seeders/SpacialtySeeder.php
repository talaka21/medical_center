<?php

namespace Database\Seeders;

use App\Models\Spacialty;  // أو Specialty حسب اسم الموديل
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Specialty;

class SpacialtySeeder extends Seeder
{


public function run(): void
{
  $specialties = [
            ['ar' => 'علم الأعصاب', 'en' => 'Neurology'],
            ['ar' => 'الغدد الصماء', 'en' => 'Endocrinology'],
            ['ar' => 'طب الأطفال', 'en' => 'Pediatrics'],
            ['ar' => 'الأمراض الجلدية', 'en' => 'Dermatology'],
            ['ar' => 'الطب النفسي', 'en' => 'Psychiatry'],
            ['ar' => 'أمراض الكلى', 'en' => 'Nephrology'],
            ['ar' => 'الروماتيزم', 'en' => 'Rheumatology'],
            ['ar' => 'طب العيون', 'en' => 'Ophthalmology'],
            ['ar' => 'الأورام', 'en' => 'Oncology'],
            ['ar' => 'طب الجهاز التنفسي', 'en' => 'Pulmonology'],
        ];

        foreach ($specialties as $specialty) {
            DB::table('specialties')->insert([
                'name' => json_encode($specialty),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
}
    }
