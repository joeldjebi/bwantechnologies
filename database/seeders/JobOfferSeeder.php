<?php

namespace Database\Seeders;

use App\Models\JobOffer;
use Illuminate\Database\Seeder;

class JobOfferSeeder extends Seeder
{
    /**
     * Seed the content recovered from the archived bwantechnologies.com site.
     */
    public function run(): void
    {
        $items = json_decode(file_get_contents(database_path('seeders/data/job_offers.json')), true);

        foreach ($items as $item) {
            JobOffer::updateOrCreate(['slug' => $item['slug']], $item);
        }
    }
}
