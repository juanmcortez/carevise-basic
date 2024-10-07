<?php

namespace Database\Seeders;

use App\Models\Users\User;
use App\Models\Commons\Phone;
use Illuminate\Database\Seeder;
use App\Models\Commons\Address;
use App\Models\Commons\Demographic;
use App\Models\Commons\EmailAddress;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create the main user
        User::factory()->create([
            'username' => 'superadmin',
            'password' => '$2y$12$sXnMQOxyj05HywbRoUgHcOGx/waS9ck0etrYCgnhXd7cwILpn6Pqq',
            'demographic_id' => Demographic::factory()->create([
                'email_address_id' => EmailAddress::factory()->create(['email' => 'superadmin@carevise.com'])->id,
                'address_id' => Address::factory()->withEmptyFields()->create()->id,
                'phone_id' => Phone::factory()->withEmptyFields()->create()->id,
                'cellphone_id' => Phone::factory()->withEmptyFields()->create()->id,
            ])->id,
        ]);

        // Create some random additional users
        User::factory(2)->create();
    }
}
