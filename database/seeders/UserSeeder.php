<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            // Admin
        $admin = Admin::updateOrCreate(
            ['email' => 'admin@example.com'],
            ['name' => 'Super Admin', 'password' =>'12345678']
        );
       $admin->assignRole('admin', 'admin');

        // Doctor
        $doctor = Doctor::updateOrCreate(
            ['email' => 'doctor@example.com'],
            ['name' => 'Dr.Ahmed', 'password'  =>'12345678']
        );
       $doctor->assignRole('doctor', 'doctor');

        // User
        $user = User::updateOrCreate(
            ['email' => 'user@example.com'],
            ['name' => 'Patient_User', 'password' =>'12345678']
        );
      $user->assignRole('user', 'user');
    }
}
