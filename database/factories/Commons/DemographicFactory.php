<?php

namespace Database\Factories\Commons;

use App\Models\Commons\Phone;
use App\Models\Commons\Address;
use App\Models\Commons\Demographic;
use App\Models\Commons\EmailAddress;
use Illuminate\Database\Eloquent\Factories\Factory;

class DemographicFactory extends Factory
{
    protected $model = Demographic::class;

    public function definition(): array
    {
        return [
            'title'             => 'mr',
            'first_name'        => $this->faker->firstName(),
            'middle_name'       => $this->faker->firstName(),
            'last_name'         => $this->faker->lastName(),
            'birthdate'         => $this->faker->dateTimeBetween('-90 years', '-1 month'),
            'gender'            => 'male',
            'about_me'          => $this->faker->paragraph(5, true),
            'email_address_id'  => EmailAddress::factory(),
            'address_id'        => Address::factory(),
            'phone_id'          => Phone::factory(),
            'cellphone_id'      => Phone::factory(),
        ];
    }
}
