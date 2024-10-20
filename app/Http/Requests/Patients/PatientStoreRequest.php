<?php

namespace App\Http\Requests\Patients;

use Illuminate\Validation\Rule;
use App\Models\Patients\Patient;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Commons\DemographicRequest;

class PatientStoreRequest extends FormRequest
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
                'pid' => ['required', Rule::unique(Patient::class, 'pid')],
                'eid' => ['nullable', Rule::unique(Patient::class, 'eid')],
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
                'pid' => '<strong>Patient ID</strong>',
                'eid' => '<strong>External patient ID</strong>',
            ],
            $this->demographic_attributes,
        );
    }
}
