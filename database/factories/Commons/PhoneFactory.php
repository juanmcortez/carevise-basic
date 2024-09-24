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
            'country_code'  => '+1',
            'area_code'     => $this->faker->randomNumber(3, true),
            'prefix_number' => $this->faker->randomNumber(3, true),
            'line_number'   => $this->faker->randomNumber(4, true),
        ];
    }
}
