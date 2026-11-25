<?php

namespace Database\Seeders;

use App\Models\Realisation;
use Illuminate\Database\Seeder;

class RealisationSeeder extends Seeder
{
    /**
     * Seed the content recovered from the archived bwantechnologies.com site.
     */
    public function run(): void
    {
        $items = json_decode(file_get_contents(database_path('seeders/data/realisations.json')), true);

        foreach ($items as $item) {
            Realisation::updateOrCreate(['slug' => $item['slug']], $item);
        }
    }
}
