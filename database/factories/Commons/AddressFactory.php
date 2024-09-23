<?php

namespace Database\Factories\Commons;

use App\Models\Commons\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    protected $model = Address::class;

    public function definition(): array
    {
        return [
            'street' => $this->faker->streetName(),
            'street_extended' => $this->faker->streetName(),
            'city' => $this->faker->city(),
            'state' => $this->faker->word(),
            'postal_code' => $this->faker->postcode(),
            'country_code' => $this->faker->word(),
        ];
    }
}
