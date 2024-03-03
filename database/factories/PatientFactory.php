<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->name(),
            "document_id" => fake()->numberBetween(0, 500),
            "notes" => fake()->text,
            "phone" => fake()->phoneNumber(),
            "created_at" => fake()->dateTimeBetween("-3 years", now()),
            "first_visit" => fake()->dateTimeBetween("-3 years", now())
        ];
    }
}