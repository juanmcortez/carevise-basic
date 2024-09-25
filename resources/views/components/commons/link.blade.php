@props(['route' => '/', 'title' => '', 'target' => '_self'])
<a id="link" href="{{ $route }}" {{ $attributes->merge(['class' => 'group']) }} title="{{ $title }}"
   target="{{ $target }}">
    {{ $slot }}
</a>
