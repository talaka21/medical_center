<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Doctor;
use App\Enums\AppointmentStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       return [
            'user_id' => User::factory(),  // ينشئ مستخدم تلقائيًا
            'doctor_id' => Doctor::inRandomOrder()->first()?->id ?? Doctor::factory(),
            'date' => $this->faker->dateTimeBetween('now', '+2 weeks')->format('Y-m-d'),
            'time' => $this->faker->time('H:i'),
            'status' => $this->faker->randomElement(AppointmentStatus::cases())->value,
        ];
    }
}
