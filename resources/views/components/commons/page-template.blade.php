<x-layouts.carevise>
    {{-- The content that is placed here, will display as the page title in the browser --}}
    <x-slot:pageTitle>
        {{ __('Page title.') }}
    </x-slot>

    {{-- The content that is placed here, will display as the page submenu --}}
    <x-slot:subMenu>
        {{ __('Page sub menu content.') }}
    </x-slot>

    {{-- The content that is placed here, will display as the page content --}}
    {{ __('Page content.') }}
</x-layouts.carevise>
