@props([
    'slctxt' => 'Please select an option',
    'items' => [],
    'value' => null,
    'label' => null,
    'class' => null,
    'nolbl' => false,
    'name' => null,
    'error' => $errors,
    'readonly' => false,
    'disabled' => false,
    'required' => false,
    'focus' => false,
    'auto' => false,
])
@php
    $error_name = $name;
    if (Str::contains($name, ['[', ']'])) {
        $error_name = Str::replace('[', '.', $name);
        $error_name = Str::replace(']', '', $error_name);
    }
@endphp
<div @class([
    'form-block',
    'disabled' => $disabled,
    'readonly' => $readonly,
    'show-error' => isset($error) ? count($error->get($error_name)) : false,
    'no-label' => $nolbl,
    $class,
])>
    @if ($label && !$nolbl)
        <label for="{{ $name }}">
            {{ $label }}
            <span @class(['hidden' => !$required])>*</span>
        </label>
    @endif
    <select class="form-input" {{ $attributes->merge(['name' => $name, 'id' => $name]) }}
    @readonly($readonly)
    @disabled($disabled)
    @required($required)
    @if ($focus) autofocus @endif
            @if ($auto) autocomplete="{{ $name }}" @else autocomplete="off" @endif>
        <option value="">{{ __($slctxt) }}</option>
        @foreach ($items as $selectValue => $selectText)
            @if (isset($value->value))
                <option @selected($value->value === $selectValue) value="{{ $selectValue }}">{{ __($selectText) }}</option>
            @elseif (isset($value))
                <option @selected($value === $selectValue) value="{{ $selectValue }}">{{ __($selectText) }}</option>
            @else
                <option value="{{ $selectValue }}">{{ __($selectText) }}</option>
            @endif
        @endforeach
    </select>
    <x-commons.error-detail :name="$error_name" />
</div>
