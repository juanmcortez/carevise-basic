@props([
    'value' => null,
    'label' => null,
    'class' => null,
    'nolbl' => false,
    'name' => null,
    'type' => 'text',
    'error' => $errors,
    'maxlength' => 255,
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
@if ($type === 'hidden')
    <input type="hidden" {{ $attributes->merge(['name' => $name, 'value' => $value]) }} />
@else
    <div @class([
    'form-block',
    'disabled' => $disabled,
    'readonly' => $readonly,
    'show-error' => count($error->get($error_name)),
    'no-label' => $nolbl,
    $class,
])>
        @if ($label && !$nolbl)
            <label for="{{ $name }}">
                {{ $label }}
                <span @class(['hidden' => !$required])>*</span>
            </label>
        @endif
        <input class="form-input"
               {{ $attributes->merge(['type' => $type, 'name' => $name, 'id' => $name, 'value' => $value, 'placeholder' => $label, 'maxlength' => $maxlength]) }}
               @readonly($readonly)
               @disabled($disabled)
               @required($required)
               @if ($focus) autofocus @endif
               @if ($auto) autocomplete="{{ $name }}" @else autocomplete="off" @endif />
        <x-commons.error-detail :name="$error_name"/>
    </div>
@endif
