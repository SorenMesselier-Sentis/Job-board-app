<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Offers>
 */
class OfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reference_id' => fake()->uuid(),
            'label' => fake()->jobTitle(),
            'contract_type' => fake()->randomElement([
                'CDI',
                'CDD',
                'alternance',
                'stage',
            ]),
            'job_type' => fake()->randomElement([
                'Developpement Web',
                'DEVOPS',
                'Architecte reseau',
                'PO',
                'CTO',
            ]),
            'description' => fake()->paragraphs(4, true),
            'image' => fake()->imageUrl(),
            'status' => fake()->randomElement([
                'draft',
                'published',
                'updated',
            ]),
            'published_at' => Carbon::createFromFormat('d-m-Y', fake()->date('d-m-Y'))->format('Y-m-d'),
        ];
    }
}
