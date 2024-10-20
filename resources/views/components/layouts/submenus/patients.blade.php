{{-- PATIENT ACCOUNT --}}
@if(request()->routeIs('patient.show'))
    @php
        $pid = request()->route()->originalParameter('patient');
        if($pid){
            $patient = \App\Models\Patients\Patient::query()->where('pid', $pid)->first();
    @endphp
    <div class="patient-block">
        <h6 class="menu">{{ __('Patient') }}</h6>
        <div class="details">
            <div class="name">{{ $patient->demographic->complete_name }}</div>
            <div class="infoblock">
                <div class="w-full flex">
                    <span class="w-1/6 font-bold" title="{{ __('Birthdate') }}">
                        <box-icon type='solid' name='cake'></box-icon>
                    </span>
                    <span class="w-5/6">
                        {{ $patient->demographic->birthdate }}
                        <em>({{ __(':age yrs.', ['age' => $patient->demographic->age]) }})</em>
                    </span>
                </div>
            </div>
            <div class="infoblock">
                <div class="w-full flex">
                    <span class="w-1/6 font-bold" title="{{ __('SSN') }}">
                        <box-icon type='solid' name='id-card'></box-icon>
                    </span>
                    <span class="w-5/6">{{ ($patient->demographic->ssn) ?? '--' }}</span>
                </div>
            </div>
            <div class="infoblock">
                <div class="w-full flex">
                    <span class="w-1/6 font-bold" title="{{ __('External ID') }}">{{ __('EID') }}</span>
                    <span class="w-5/6">{{ ($patient->eid) ?? '--' }}</span>
                </div>
            </div>
            {{-- <div class="infoblock">
                <div class="w-full flex">
                    <span class="w-1/6 font-bold text-right pr-1">{{ __('PID') }}</span>
                    <span class="w-5/6">{{ $patient->pid }}</span>
                </div>
            </div> --}}
            <div class="infoblock">
                <div class="w-full flex">
                    <span class="w-1/6 font-bold" title="{{ __('Address') }}">
                        <box-icon type='solid' name='home'></box-icon>
                    </span>
                    <span class="w-5/6">{!! $patient->demographic->address->formatted !!}</span>
                </div>
            </div>
            <div class="infoblock">
                <div class="w-full flex">
                    <span class="w-1/6 font-bold" title="{{ __('Phone') }}">
                        <box-icon type='solid' name='phone'></box-icon>
                    </span>
                    <span class="w-5/6">{!! $patient->demographic->phone->formatted !!}</span>
                </div>
            </div>
            <div class="infoblock">
                <div class="w-full flex">
                    <span class="w-1/6 font-bold" title="{{ __('Cellphone') }}">
                        <box-icon name='mobile'></box-icon>
                    </span>
                    <span class="w-5/6">{!! $patient->demographic->cellphone->formatted !!}</span>
                </div>
            </div>
        </div>


        <h6 class="menu">{{ __('Insurance Details') }}</h6>
        <div class="details">
            <div class="name">
                {{ ($patient->insurances->primary->company->name) ?? '- Primary Insurance -' }}
            </div>
            <div class="infoblock">
                <div class="w-full flex">
                    <span class="w-1/6 font-bold" title="{{ __('Policy') }}">{{ __('POL') }}</span>
                    <span class="w-5/6">
                        {{ ($patient->insurances->primary->policy) ?? '--' }}
                    </span>
                </div>
            </div>
            <div class="infoblock">
                <div class="w-full flex">
                    <span class="w-1/6 font-bold" title="{{ __('Group') }}">{{ __('GRP') }}</span>
                    <span class="w-5/6">
                        {{ ($patient->insurances->primary->group) ?? '--' }}
                    </span>
                </div>
            </div>
            <div class="infoblock">
                <div class="w-full flex">
                    <span class="w-1/6 font-bold" title="{{ __('Phone') }}">
                        <box-icon type='solid' name='phone'></box-icon>
                    </span>
                    <span class="w-5/6">
                        {{ ($patient->insurances->primary->company->phone->formatted) ?? '--' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="details">
            <div class="name">
                {{ ($patient->insurances->secondary->company->name) ?? '- Secondary Insurance -' }}
            </div>
            <div class="infoblock">
                <div class="w-full flex">
                    <span class="w-1/6 font-bold" title="{{ __('Policy') }}">{{ __('POL') }}</span>
                    <span class="w-5/6">
                        {{ ($patient->insurances->secondary->policy) ?? '--' }}
                    </span>
                </div>
            </div>
            <div class="infoblock">
                <div class="w-full flex">
                    <span class="w-1/6 font-bold" title="{{ __('Group') }}">{{ __('GRP') }}</span>
                    <span class="w-5/6">
                        {{ ($patient->insurances->secondary->group) ?? '--' }}
                    </span>
                </div>
            </div>
            <div class="infoblock">
                <div class="w-full flex">
                    <span class="w-1/6 font-bold" title="{{ __('Phone') }}">
                        <box-icon type='solid' name='phone'></box-icon>
                    </span>
                    <span class="w-5/6">
                        {{ ($patient->insurances->secondary->company->phone->formatted) ?? '--' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="details">
            <div class="name">
                {{ ($patient->insurances->tertiary->company->name) ?? '- Tertiary Insurance -' }}
            </div>
            <div class="infoblock">
                <div class="w-full flex">
                    <span class="w-1/6 font-bold" title="{{ __('Policy') }}">{{ __('POL') }}</span>
                    <span class="w-5/6">
                        {{ ($patient->insurances->tertiary->policy) ?? '--' }}
                    </span>
                </div>
            </div>
            <div class="infoblock">
                <div class="w-full flex">
                    <span class="w-1/6 font-bold" title="{{ __('Group') }}">{{ __('GRP') }}</span>
                    <span class="w-5/6">
                        {{ ($patient->insurances->tertiary->group) ?? '--' }}
                    </span>
                </div>
            </div>
            <div class="infoblock">
                <div class="w-full flex">
                    <span class="w-1/6 font-bold" title="{{ __('Phone') }}">
                        <box-icon type='solid' name='phone'></box-icon>
                    </span>
                    <span class="w-5/6">
                        {{ ($patient->insurances->tertiary->company->phone->formatted) ?? '--' }}
                    </span>
                </div>
            </div>
        </div>

    </div>
    @php
        }
    @endphp
@endif

{{-- PATIENTS --}}
<h6 class="menu">{{ __('Patients Menu') }}</h6>
<x-commons.link :class="request()->routeIs('patient.list') ? 'item active' : 'item'" :route="route('patient.list')">
    <box-icon type='solid' name='user-detail'></box-icon>
    {{ __('List') }}
</x-commons.link>
{{-- <x-commons.link :class="request()->routeIs('user.profile.new') ? 'item active' : 'item'"
                :route="route('user.profile.new')">
    <box-icon type='solid' name='user-plus'></box-icon>
    {{ __('Create') }}
</x-commons.link> --}}


{{-- RECENT PATIENTS LIST --}}
<h6 class="menu">{{ __('Recently reviewed patients') }}</h6>
@for($i=0; $i<=random_int(0, 9); $i++)
    <x-commons.link :class="request()->routeIs('patient.recent') ? 'item active' : 'item'"
                    :route="route('patient.list')">
        <box-icon name='user-circle'></box-icon>
        {{ __('Recent patient #:idx', ['idx' => ($i+1)]) }}
    </x-commons.link>
@endfor
