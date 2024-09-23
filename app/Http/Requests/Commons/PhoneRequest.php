<?php

namespace App\Http\Requests\Commons;

use Illuminate\Foundation\Http\FormRequest;

class PhoneRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'country_code' => ['nullable'],
            'area_code' => ['nullable'],
            'prefix_number' => ['nullable'],
            'line_number' => ['nullable'],
        ];
    }
}
