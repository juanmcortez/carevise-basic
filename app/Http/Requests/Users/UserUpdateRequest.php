<?php

namespace App\Http\Requests\Users;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Commons\DemographicRequest;

class UserUpdateRequest extends FormRequest
{
    private array $demographic_rules;
    private array $demographic_attributes;

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
        // Prepare the "is active" / "is provider" checkboxes status for validation
        $this->merge([
            'is_active'         => (bool) $this->is_active,
            'is_provider'       => (bool) $this->is_provider,
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
        foreach ((new DemographicRequest)->rules() as $item => $rule) {
            $this->demographic_rules['demographic.'.$item] = $rule;
        }
        // Prepare the rules before validating them

        return array_merge(
            [
                'username'          => ['required', 'string', 'max:64'],
                'is_active'         => ['boolean'],
                'is_provider'       => ['nullable', 'boolean'],
                'demographic_id'    => [Rule::exists('demographics', 'id')],
            ],
            $this->demographic_rules,
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
        foreach ((new DemographicRequest)->attributes() as $item => $attribute) {
            $this->demographic_attributes['demographic.'.$item] = $attribute;
        }
        // Prepare the rules before validating them

        return array_merge(
            [
                'username'          => '<strong>Username</strong>',
                'is_active'         => '<strong>Is active checkbox</strong>',
                'is_provider'       => '<strong>Is provider checkbox</strong>',
                'demographic_id'    => '<strong>Demographic info</strong>',
            ],
            $this->demographic_attributes,
        );
    }
}
