<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'last_name' => fake()->lastName(),
            'password' => Hash::make('podcastMDS-admin89o!23'),
            'email' => fake()->email(),
            'created_at' => now(),
            'updated_at' => now(),
            'remember_token' => Str::random(10),
            //
        ];
    }
}
