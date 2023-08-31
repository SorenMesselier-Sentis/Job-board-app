<?php

namespace Database\Seeders;

use App\Models\Offer;
use App\Models\Company;
use App\Models\Location;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $locations = Location::factory(10)->create();

        $locations->each(function ($location) {
            $companies = Company::factory()->create([
                'location_id' => $location->id,
            ]);

            $companies->each(function ($company) {
                Offer::factory(2)->create([
                    'company_id' => $company->id,
                ]);
            });
        });
    }
}
