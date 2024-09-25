<?php

namespace App\Http\Requests\Commons;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class DemographicRequest extends FormRequest
{
    private array $email_address_rules;
    private array $email_address_attributes;
    private array $address_rules;
    private array $address_attributes;
    private array $phone_rules;
    private array $phone_attributes;
    private array $cellphone_rules;
    private array $cellphone_attributes;

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
        foreach ((new EmailAddressRequest)->rules() as $item => $rule) {
            $this->email_address_rules['email_address.'.$item] = $rule;
        }
        foreach ((new AddressRequest)->rules() as $item => $rule) {
            $this->address_rules['address.'.$item] = $rule;
        }
        foreach ((new PhoneRequest)->rules() as $item => $rule) {
            $this->phone_rules['phone.'.$item] = $rule;
        }
        foreach ((new PhoneRequest)->rules() as $item => $rule) {
            $this->cellphone_rules['cellphone.'.$item] = $rule;
        }
        // Prepare the rules before validating them

        return array_merge(
            [
                'title'             => ['nullable', 'string', 'max:12'],
                'first_name'        => ['required', 'string', 'max:128'],
                'middle_name'       => ['nullable', 'string', 'max:128'],
                'last_name'         => ['required', 'string', 'max:128'],
                'birthdate'         => ['required', 'date', 'date_format:"'.config('carevise.formats.date').'"', 'before_or_equal:today'],
                'gender'            => ['required', 'lowercase', 'string', 'max:64'],
                'about_me'          => ['nullable', 'string'],
                'email_address_id'  => [Rule::exists('demographics_emails_addresses', 'id')],
                'address_id'        => [Rule::exists('demographics_addresses', 'id')],
                'phone_id'          => [Rule::exists('demographics_phones', 'id')],
                'cellphone_id'      => [Rule::exists('demographics_phones', 'id')],
            ],
            $this->email_address_rules,
            $this->address_rules,
            $this->phone_rules,
            $this->cellphone_rules,
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
        foreach ((new EmailAddressRequest)->attributes() as $item => $attribute) {
            $this->email_address_attributes['email_address.'.$item] = $attribute;
        }
        foreach ((new AddressRequest)->attributes() as $item => $attribute) {
            $this->address_attributes['address.'.$item] = $attribute;
        }
        foreach ((new PhoneRequest)->attributes() as $item => $attribute) {
            $this->phone_attributes['phone.'.$item] = $attribute;
        }
        foreach ((new PhoneRequest)->attributes() as $item => $attribute) {
            $this->cellphone_attributes['cellphone.'.$item] = $attribute;
        }
        // Prepare the rules before validating them

        return array_merge(
            [
                'title'             => '<strong>Title</strong>',
                'first_name'        => '<strong>First name</strong>',
                'middle_name'       => '<strong>Middle name</strong>',
                'last_name'         => '<strong>Last name</strong>',
                'birthdate'         => '<strong>Birthdate</strong>',
                'gender'            => '<strong>Gender</strong>',
                'about_me'          => '<strong>About me</strong>',
                'email_address_id'  => '<strong>E-mail info</strong>',
                'address_id'        => '<strong>Address info</strong>',
                'phone_id'          => '<strong>Phone info</strong>',
                'cellphone_id'      => '<strong>Cellphone info</strong>',
            ],
            $this->email_address_attributes,
            $this->address_attributes,
            $this->phone_attributes,
            $this->cellphone_attributes,
        );
    }
}
