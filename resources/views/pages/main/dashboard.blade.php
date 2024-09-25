<x-layouts.carevise>
    {{-- The content that is placed here, will display as the page title in the browser --}}
    <x-slot:pageTitle>
        {{ __('Dashboard') }}
    </x-slot>

    {{-- The content that is placed here, will display as the page content --}}
    @php
        $users = \App\Models\Users\User::with('demographic', 'demographic.email_address', 'demographic.address', 'demographic.phone', 'demographic.cellphone')
            ->paginate(10);
    @endphp
    <x-tables.simple class="user-list my-6"
                     :columnsWidth="['w-2/12', 'w-2/12', 'w-1/12', 'w-1/12', 'w-2/12', 'w-2/12', 'w-1/12', 'w-1/12']"
                     :columnsLabel="['Name', 'Username', 'Birthdate', 'Gender', 'E-mail', 'Address', 'Phone', 'Cellphone']"
                     :pagination="$users->links()">
        @if ($users->isEmpty())
            <tr>
                <td colspan="5">{{ __('There are no users to display') }}</td>
            </tr>
        @else
            @foreach ($users as $user)
                <tr x-data x-on:click="window.location.href='{{ route('user.profile.edit', ['user' => $user->username]) }}'">
                    <td class="!text-left">{{ $user->demographic->complete_name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->demographic->birthdate->format('M d, Y') }}</td>
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
