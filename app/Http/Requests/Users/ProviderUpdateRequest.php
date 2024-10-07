<?php

namespace App\Http\Requests\Users;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProviderUpdateRequest extends FormRequest
{
    private array $user_rules;
    private array $user_attributes;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        // Prepare the "calendar_active" checkbox status for validation
        $this->merge([
            'is_calendar_active' => (bool) $this->is_calendar_active,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, array|string>
     */
    public function rules(): array
    {
        // Prepare the rules before validating them
        foreach ((new UserUpdateRequest)->rules() as $item => $rule) {
            $this->user_rules['user.'.$item] = $rule;
        }
        // Prepare the rules before validating them

        return array_merge(
            $this->user_rules,
            [
                'npi' => ['required_if:is_provider,true', 'string', 'min:10', 'max:12'],
                'taxonomy' => ['nullable', 'string', 'min:10', 'max:12'],
                'federal_tax' => ['nullable', 'string', 'min:10', 'max:12'],
                'specialty' => ['nullable'],
                'is_calendar_active' => ['nullable', 'boolean'],
                'user_id' => [Rule::exists('users', 'id')],
            ]
        );
    }

    /**
     * Get the custom validation attributes that apply to the request.
     *
     * @return array<string, array|string>
     */
    public function attributes(): array
    {
        // Prepare the attributes before validating them
        foreach ((new UserUpdateRequest)->attributes() as $item => $attribute) {
            $this->user_attributes['user.'.$item] = $attribute;
        }
        // Prepare the attributes before validating them

        return array_merge(
            $this->user_attributes,
            [
                'npi' => '<strong>NPI</strong>',
                'taxonomy' => '<strong>Taxonomy</strong>',
                'federal_tax' => '<strong>Federal tax</strong>',
                'specialty' => '<strong>Specialty</strong>',
                'is_calendar_active' => '<strong>Is calendar active</strong>',
                'user_id' => '<strong>User info</strong>',
            ]
        );
    }
}
