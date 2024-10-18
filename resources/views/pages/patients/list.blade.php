<x-layouts.carevise>
    {{-- The content that is placed here, will display as the page title in the browser --}}
    <x-slot:pageTitle>
        {{ __('Full list of active patients in the system') }}
    </x-slot>

    {{-- The content that is placed here, will display as the page submenu --}}
    <x-slot:subMenu>patient</x-slot>


    {{-- The content that is placed here, will display as the page content --}}
    <x-tables.simple x-data class="patient-list"
                     :columnsWidth="['w-4/12', 'w-2/12', 'w-2/12', 'w-2/12', 'w-1/12', 'w-1/12']"
                     :columnsLabel="['Name', 'Birthdate', 'Gender', 'Phone', 'PID', 'EID']"
                     :pagination="$patients->links()">
        @if ($patients->isEmpty())
            <tr>
                <td colspan="7" class="!text-center">{{ __('There are no patients to display') }}</td>
            </tr>
        @else
            @foreach ($patients as $patient)
                <tr {{--x-on:click="window.location.href='{{ route('user.profile.edit', ['user' => $user->username]) }}'"--}}>
                    <td class="!text-left">{{ $patient->demographic->complete_name }}</td>
                    <td>{{ $patient->demographic->birthdate }}</td>
                    <td>{{ \Str::title(__($patient->demographic->gender)) }}</td>
                    <td>{{ $patient->demographic->phone->formatted }}</td>
                    <td>{{ $patient->pid }}</td>
                    <td>{{ $patient->eid }}</td>
                </tr>
            @endforeach
        @endif
    </x-tables.simple>
</x-layouts.carevise>
