<?php

namespace Database\Factories;

use App\Enums\ArticleCategory;
use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->unique()->sentence(6);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'category' => fake()->randomElement(ArticleCategory::cases()),
            'author_name' => fake()->name(),
            'excerpt' => fake()->sentence(15),
            'content' => fake()->paragraphs(4, true),
            'tags' => fake()->words(4),
            'published_at' => fake()->dateTimeBetween('-1 year'),
        ];
    }
}
