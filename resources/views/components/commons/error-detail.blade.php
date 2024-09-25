@props(['name' => null])
@if (isset($errors) && count($errors->get($name)))
    @foreach ($errors->get($name) as $message)
        <span class="error-detail" role="alert" tabindex="-1" x-data="{ isOpen: false }" x-cloak x-show="isOpen"
              x-init="$nextTick(() => { isOpen = !isOpen }); setTimeout(() => isOpen = !isOpen, 4000);"
              x-transition.duration.300ms>
        {!! $message !!}
    </span>
    @endforeach
@endif
