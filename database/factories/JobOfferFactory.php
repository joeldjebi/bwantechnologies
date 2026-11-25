<?php

namespace Database\Factories;

use App\Enums\ContractType;
use App\Enums\Department;
use App\Models\JobOffer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<JobOffer>
 */
class JobOfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->unique()->jobTitle();

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'contract_type' => fake()->randomElement(ContractType::cases()),
            'department' => fake()->randomElement(Department::cases()),
            'location' => fake()->randomElement(['Abidjan', 'Grand-Bassam']),
            'description' => fake()->paragraph(),
            'requirements' => fake()->paragraph(),
            'salary' => '500 000 - 800 000 FCFA',
            'skills' => fake()->words(4),
            'is_active' => true,
        ];
    }
}
