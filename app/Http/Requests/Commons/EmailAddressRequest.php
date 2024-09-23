<?php

namespace App\Http\Requests\Commons;

use Illuminate\Validation\Rule;
use App\Models\Commons\EmailAddress;
use Illuminate\Foundation\Http\FormRequest;

class EmailAddressRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email'             => ['required', 'email', 'lowercase', 'max:254', Rule::unique(EmailAddress::class)],
            'email_verified_at' => ['nullable', 'date'],
        ];
    }
}
