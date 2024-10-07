<x-layouts.carevise>
    {{-- The content that is placed here, will display as the page title in the browser --}}
    <x-slot:pageTitle>
        {{ __('Full list of active providers in the system') }}
    </x-slot>

    {{-- The content that is placed here, will display as the page submenu --}}
    <x-slot:subMenu>provider</x-slot>

    {{-- The content that is placed here, will display as the page content --}}
    <x-tables.simple x-data class="user-list"
                     :columnsWidth="['w-3/12', 'w-2/12', 'w-3/12', 'w-2/12', 'w-2/12']"
                     :columnsLabel="['Name', 'username', 'Specialty', 'NPI', 'Taxonomy']"
                     :pagination="$providers->links()">
        @if ($providers->isEmpty())
            <tr>
                <td colspan="7" class="!text-center">{{ __('There are no providers to display') }}</td>
            </tr>
        @else
            @foreach ($providers as $provider)
                <tr x-on:click="window.location.href='{{ route('provider.profile.edit', ['user' => $provider->user->username]) }}'">
                    <td class="!text-left">{{ $provider->user->demographic->complete_name }}</td>
                    <td>{{ __($provider->user->username) }}</td>
                    <td class="!text-left">{!! \Str::title($provider->specialty) !!}</td>
                    <td>{{ $provider->npi }}</td>
                    <td>{{ $provider->taxonomy }}</td>
                </tr>
            @endforeach
        @endif
    </x-tables.simple>
</x-layouts.carevise>
