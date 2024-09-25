<?php

namespace App\Http\Requests\Commons;

use Illuminate\Foundation\Http\FormRequest;

class PhoneRequest extends FormRequest
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
            'country_code'  => ['nullable', 'string', 'between:2,7', 'starts_with:+'],
            'area_code'     => ['nullable', 'numeric', 'min_digits:2', 'max_digits:4'],
            'prefix_number' => ['nullable', 'numeric', 'min_digits:3', 'max_digits:5'],
            'line_number'   => ['nullable', 'numeric', 'min_digits:3', 'max_digits:5'],
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
            'country_code'  => '<strong>Country code</strong>',
            'area_code'     => '<strong>Area code</strong>',
            'prefix_number' => '<strong>Prefix number</strong>',
            'line_number'   => '<strong>Line number</strong>',
        ];
    }
}
