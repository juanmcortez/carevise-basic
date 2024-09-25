<?php

namespace App\Http\Requests\Commons;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'street'            => ['nullable', 'string', 'max:128'],
            'street_extended'   => ['nullable', 'string', 'max:128'],
            'city'              => ['nullable', 'string', 'max:64'],
            'state'             => ['nullable', 'string', 'max:64'],
            'postal_code'       => ['nullable', 'string', 'max:16'],
            'country_code'      => ['nullable', 'lowercase', 'string', 'max:4'],
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
            'street'            => '<strong>Main address</strong>',
            'street_extended'   => '<strong>Extended address</strong>',
            'city'              => '<strong>City</strong>',
            'state'             => '<strong>State</strong>',
            'postal_code'       => '<strong>Postal code / Zip</strong>',
            'country_code'      => '<strong>Country</strong>',
        ];
    }
}
