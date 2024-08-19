<?php

namespace Database\Factories;

use App\Models\users;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\users>
 */
class usersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = users::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->name(),
            'username' => $this->faker->unique()->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
