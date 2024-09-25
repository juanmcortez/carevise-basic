@props([
    'class' => null,
    'name' => null,
    'disabled' => false,
    'required' => false,
    'focus' => false,
])
<button
    @class(['form-block group'])
    {{ $attributes->merge(['name' => $name, 'id' => $name]) }}
    @disabled($disabled)
    @required($required)
    @if ($focus) autofocus @endif>
    {{ $slot }}
</button>
