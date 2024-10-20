<?php

namespace Database\Factories\Patients;

use Illuminate\Support\Str;
use App\Models\Patients\Patient;
use App\Models\Commons\Demographic;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    protected $model = Patient::class;

    public function definition(): array
    {
        return [
            'eid' => ($this->faker->boolean) ? Str::upper(Str::random(10)) : null,
            'demographic_id' => Demographic::factory(),
        ];
    }
}
