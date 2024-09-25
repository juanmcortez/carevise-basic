<?php

namespace App\Http\Requests\Commons;

use Illuminate\Validation\Rule;
use App\Models\Commons\EmailAddress;
use Illuminate\Foundation\Http\FormRequest;

class EmailAddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, array|string>
     */
    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'email',
                'lowercase',
                'string',
                'max:254',
                // Rule::unique(EmailAddress::class)->ignore($this->demographic->email_address->id)
            ],
            'email_verified_at' => ['nullable', 'date'],
        ];
    }

    /**
     * Get the custom validation attributes that apply to the request.
     *
     * @return array<string, array|string>
     */
    public function attributes(): array
    {
        return [
            'email'             => '<strong>E-mail address</strong>',
            'email_verified_at' => '<strong>E-mail address verified</strong>',
        ];
    }
}
