<x-layouts.carevise>
    {{-- The content that is placed here, will display as the page title in the browser --}}
    <x-slot:pageTitle>
        {{ __('Patient account') }}
    </x-slot>

    {{-- The content that is placed here, will display as the page submenu --}}
    <x-slot:subMenu>patient</x-slot>

    {{-- The content that is placed here, will display as the page content --}}
    <div class="patient-profile">
        {{ $patient }}
    </div>
</x-layouts.carevise>
