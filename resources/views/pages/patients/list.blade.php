<x-layouts.carevise>
    {{-- The content that is placed here, will display as the page title in the browser --}}
    <x-slot:pageTitle>
        {{ __('Full list of active patients in the system') }}
    </x-slot>

    {{-- The content that is placed here, will display as the page submenu --}}
    <x-slot:subMenu>patient</x-slot>


    {{-- The content that is placed here, will display as the page content --}}
    <x-tables.simple x-data class="patient-list"
                     :columnsWidth="['w-3/12', 'w-2/12', 'w-2/12', 'w-1/12', 'w-1/12', 'w-1/12', 'w-1/12', 'w-1/12']"
                     :columnsLabel="['Name', 'Phone', 'SSN', 'Birthdate', 'Accession #', 'EID', 'PID', 'Last Visit']"
                     :pagination="$patients->links()">
        @if ($patients->isEmpty())
            <tr>
                <td colspan="7" class="!text-center">{{ __('There are no patients to display') }}</td>
            </tr>
        @else
            @foreach ($patients as $patient)
                <tr x-on:click="window.location.href='{{ route('patient.show', ['patient' => $patient->pid]) }}'">
                    <td class="!text-left">{{ $patient->demographic->complete_name }}</td>
                    <td>{{ $patient->demographic->phone->formatted }}</td>
                    <td> --</td>
                    <td>{{ $patient->demographic->birthdate }}</td>
                    <td> --</td>
                    <td>{{ ($patient->eid) ?? '--' }}</td>
                    <td>{{ $patient->pid }}</td>
                    <td> --</td>
                </tr>
            @endforeach
        @endif
    </x-tables.simple>
</x-layouts.carevise>
