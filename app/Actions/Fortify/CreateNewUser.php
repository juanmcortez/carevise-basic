<?php

namespace App\Actions\Fortify;

use Carbon\Carbon;
use App\Models\Users\User;
use App\Models\Commons\Phone;
use Illuminate\Validation\Rule;
use App\Models\Commons\Address;
use App\Models\Commons\Demographic;
use Illuminate\Support\Facades\Hash;
use App\Models\Commons\EmailAddress;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'username' => ['required', 'string', 'max:64', 'lowercase'],
            'password' => $this->passwordRules(),
            'first_name' => ['required', 'string', 'max:128'],
            'middle_name' => ['nullable', 'string', 'max:128'],
            'last_name' => ['required', 'string', 'max:128'],
            'email' => ['required', 'email', 'lowercase', 'string', 'max:254', Rule::unique(EmailAddress::class)],
        ], attributes: [
            'username' => '<strong>Username</strong>',
            'password' => '<strong>Password</strong>',
            'first_name' => '<strong>First name</strong>',
            'middle_name' => '<strong>Middle name</strong>',
            'last_name' => '<strong>Last name</strong>',
            'email' => '<strong>E-mail address</strong>',
        ])->validate();

        // Store the validated email
        $email_address = EmailAddress::factory()
            ->create([
                'email' => $input['email'],
            ]);

        // Store the validated demographic
        $demographic = Demographic::factory()
            ->create([
                'first_name' => $input['first_name'],
                'middle_name' => $input['middle_name'],
                'last_name' => $input['last_name'],
                'birthdate' => Carbon::now(),
                'about_me' => null,
                'email_address_id' => $email_address->id,
                'address_id' => Address::factory()->withEmptyFields()->create(),
                'phone_id' => Phone::factory()->withEmptyFields()->create(),
                'cellphone_id' => Phone::factory()->withEmptyFields()->create(),
            ]);

        // Create and return the new user
        return User::factory()
            ->create([
                'username' => $input['username'],
                'password' => Hash::make($input['password']),
                'demographic_id' => $demographic->id,
            ]);
    }
}
