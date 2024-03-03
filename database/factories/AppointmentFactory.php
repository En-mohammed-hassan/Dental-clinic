<?php

namespace Database\Factories;

use App\Models\Patient;
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
            "patient_id" => Patient::inRandomOrder()->first()->get("id")[0]->id,
            "app_date" => fake()->dateTimeBetween("-3 years", now()),
            "created_at" => fake()->dateTimeBetween("-3 years", now()),
            "app_time" => fake()->time(),
            "periode" => fake()->numberBetween(0, 100)

        ];
    }
}