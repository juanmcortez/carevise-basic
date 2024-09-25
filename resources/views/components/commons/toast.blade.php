@props([
    'type' => 'info',
    'extra' => session('status') ?? false,
    'info' => session('info') ?? false,
    'success' => session('success') ?? false,
    'errors' => $errors ?? false,
    'warning' => session('warning') ??false,
])
@php
    if ($info) {
        $type = 'info';
    } elseif ($extra) {
        $type = 'info';
    } elseif ($success) {
        $type = 'success';
    } elseif ($errors->any()) {
        $type = 'error';
    } elseif ($warning) {
        $type = 'warning';
    }
@endphp
@if ($info || $extra || $success || $errors->any() || $warning)
    <div {{ $attributes->merge(['class' => 'toast ' . $type]) }} role="alert" tabindex="-1" x-data="{ isOpen: false }"
         x-cloak x-show="isOpen" x-init="$nextTick(() => { isOpen = !isOpen });
    setTimeout(() => isOpen = !isOpen, 8000);" x-transition.duration.300ms>
        <h6>{{ __($type) }}</h6>
        <div class="message">
            @if ($extra === 'verification-link-sent')
                <span>
            {!! __('A new <strong>verification link</strong> has been sent to the <strong>email address</strong> you provided during registration.') !!}
        </span>
            @elseif ($extra)
                <span>{!! $extra !!}</span>
            @elseif ($info)
                <span>{!! $info !!}</span>
            @elseif ($errors->any())
                @foreach ($errors->all() as $message)
                    <span>{!! $message !!}</span>
                @endforeach
            @elseif ($success)
                <span>{!! $success !!}</span>
            @elseif ($warning)
                <span>{!! $warning !!}</span>
            @endif
        </div>
    </div>
@endif
