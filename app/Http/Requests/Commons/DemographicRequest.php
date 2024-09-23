<?php

namespace App\Http\Requests\Commons;

use Illuminate\Foundation\Http\FormRequest;

class DemographicRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['nullable'],
            'first_name' => ['required'],
            'middle_name' => ['nullable'],
            'last_name' => ['required'],
            'birthdate' => ['required', 'date'],
            'gender' => ['required'],
            'email_address_id' => ['required', 'exists:demographics_emails_addresses'],
            'address_id' => ['required', 'exists:demographics_addresses'],
            'phone_id' => ['required', 'exists:demographics_phones'],
            'cellphone_id' => ['required', 'exists:demographics_phones'],
        ];
    }
}
