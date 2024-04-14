<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\UrlPair;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\UrlPair>
 */
final class UrlPairFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UrlPair::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'minimized_url' => fake()->word,
            'original_url' => fake()->word,
        ];
    }
}
