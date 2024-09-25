@props([
    'value' => null,
    'label' => null,
    'class' => null,
    'nolbl' => false,
    'name' => null,
    'error' => $errors,
    'rows' => 5,
    'cols' => 5,
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
    <textarea class="form-textarea"
              {{ $attributes->merge(['name' => $name, 'id' => $name, 'placeholder' => $label, 'rows' => $rows, 'cols' => $cols]) }}
              @readonly($readonly)
              @disabled($disabled)
              @required($required)
              @if ($focus) autofocus @endif
              @if ($auto) autocomplete="{{ $name }}" @else autocomplete="off" @endif>{{ $value }}</textarea>
    <x-commons.error-detail :name="$error_name" />
</div>
