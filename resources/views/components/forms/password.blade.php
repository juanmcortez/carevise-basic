@props([
    'value' => null,
    'label' => null,
    'class' => null,
    'nolbl' => false,
    'name' => null,
    'type' => 'password',
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
<div @class([
    'form-block password',
    'disabled' => $disabled,
    'readonly' => $readonly,
    'show-error' => count($error->get($error_name)),
    'no-label' => $nolbl,
    $class,
]) x-data="{ show: false }">
    @if ($label && !$nolbl)
        <label for="{{ $name }}">
            {{ $label }}
            <span @class(['hidden' => !$required])>*</span>
        </label>
    @endif
    <input class="form-input" :type=" show ? 'text': 'password' "
           {{ $attributes->merge(['name' => $name, 'id' => $name, 'value' => $value, 'placeholder' => $label, 'maxlength' => $maxlength]) }}
           @readonly($readonly)
           @disabled($disabled)
           @required($required)
           @if ($focus) autofocus @endif
           @if ($auto) autocomplete="{{ $name }}" @else autocomplete="off" @endif />
    <span @click="show = !show">
            <box-icon name='show-alt' x-show="!show"></box-icon>
            <box-icon name='hide' x-show="show"></box-icon>
        </span>
    <x-commons.error-detail :name="$error_name" />
</div>
