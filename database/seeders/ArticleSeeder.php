<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Seed the content recovered from the archived bwantechnologies.com site.
     */
    public function run(): void
    {
        $items = json_decode(file_get_contents(database_path('seeders/data/articles.json')), true);

        foreach ($items as $item) {
            Article::updateOrCreate(['slug' => $item['slug']], $item);
        }
    }
}
