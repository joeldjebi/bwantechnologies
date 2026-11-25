<?php

namespace Database\Factories;

use App\Enums\ProjectType;
use App\Models\Realisation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Realisation>
 */
class RealisationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->unique()->sentence(4);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'type' => fake()->randomElement(ProjectType::cases()),
            'client' => fake()->company(),
            'description' => fake()->paragraph(),
            'features' => fake()->words(6),
            'technologies' => fake()->randomElements(['Laravel', 'Vue.js', 'React', 'Flutter', 'MySQL', 'PostgreSQL', 'Redis'], 4),
            'completed_at' => fake()->dateTimeBetween('-3 years'),
            'duration' => fake()->numberBetween(2, 12).' mois',
            'budget' => 'Confidentiel',
            'is_published' => true,
        ];
    }
}
