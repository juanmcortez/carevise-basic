<?php

namespace Database\Factories\Commons;

use Str;
use App\Models\Commons\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    protected $model = Address::class;

    /**
     * @return array
     */
    public function definition(): array
    {
        $fullAddress = $street = $this->faker->streetAddress();
        $streetExtended = null;
        if (Str::contains($fullAddress, 'Suite', true)) {
            $street = Str::before($fullAddress, 'Suite');
            $streetExtended = Str::remove($street, $fullAddress, false);
        }
        if (Str::contains($fullAddress, 'Apt', true)) {
            $street = Str::before($fullAddress, 'Apt');
            $streetExtended = Str::remove($street, $fullAddress, false);
        }

        return [
            'street' => $street,
            'street_extended' => $streetExtended,
            'city' => $this->faker->city(),
            'state' => 'New Jersey',
            'postal_code' => $this->faker->postcode(),
            'country_code' => 'us',
        ];
    }

    public function withEmptyFields()
    {
        return $this->state(function (array $attributes) {
            $fields = ['street', 'street_extended', 'city', 'state', 'postal_code', 'country_code'];
            foreach ($fields as $field) {
                $attributes[$field] = null;
            }
            return $attributes;
        });
    }
}
