<?php

namespace Database\Factories\Commons;

use Illuminate\Support\Carbon;
use App\Models\Commons\EmailAddress;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmailAddressFactory extends Factory
{
    protected $model = EmailAddress::class;

    public function definition(): array
    {
        return [
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => Carbon::now(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
