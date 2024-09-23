<?php

namespace Database\Factories\Commons;

use App\Models\Commons\Phone;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhoneFactory extends Factory
{
    protected $model = Phone::class;

    public function definition(): array
    {
        return [
            'country_code' => $this->faker->word(),
            'area_code' => $this->faker->word(),
            'prefix_number' => $this->faker->word(),
            'line_number' => $this->faker->word(),
        ];
    }
}
