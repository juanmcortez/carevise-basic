<?php

namespace Database\Factories\Users;

use App\Models\Users\User;
use App\Models\Users\Provider;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProviderFactory extends Factory
{
    protected $model = Provider::class;

    public function definition(): array
    {
        return [
            'npi' => $this->faker->numerify('##########'),
            'taxonomy' => $this->faker->numerify('###ZP####X'),
            'federal_tax' => null,
            'specialty' => null,
            'is_calendar_active' => $this->faker->boolean(),
            'user_id' => User::factory(['is_provider' => true]),
        ];
    }
}
