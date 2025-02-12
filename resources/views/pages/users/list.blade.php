<x-layouts.carevise>
    {{-- The content that is placed here, will display as the page title in the browser --}}
    <x-slot:pageTitle>
        {{ __('Full list of active users in the system') }}
    </x-slot>

    {{-- The content that is placed here, will display as the page submenu --}}
    <x-slot:subMenu>user</x-slot>

    {{-- The content that is placed here, will display as the page content --}}
    <x-tables.simple x-data class="user-list"
                     :columnsWidth="['w-2/12', 'w-1/12', 'w-1/12', 'w-2/12', 'w-2/12', 'w-2/12', 'w-2/12']"
                     :columnsLabel="['Name', 'Birthdate', 'Gender', 'E-mail', 'Address', 'Phone', 'Cellphone']"
                     :pagination="$users->links()">
        @if ($users->isEmpty())
            <tr>
                <td colspan="7" class="!text-center">{{ __('There are no users to display') }}</td>
            </tr>
        @else
            @foreach ($users as $user)
                <tr x-on:click="window.location.href='{{ route('user.profile.edit', ['user' => $user->username]) }}'">
                    <td class="!text-left">{{ $user->demographic->complete_name }}</td>
                    <td>{{ $user->demographic->birthdate }}</td>
                    <td>{{ \Str::title(__($user->demographic->gender)) }}</td>
                    <td>{{ $user->demographic->email_address->email }}</td>
                    <td class="!text-left">{!! $user->demographic->address->formatted !!}</td>
                    <td>{{ $user->demographic->phone->formatted }}</td>
                    <td>{{ $user->demographic->cellphone->formatted }}</td>
                </tr>
            @endforeach
        @endif
    </x-tables.simple>
</x-layouts.carevise>
