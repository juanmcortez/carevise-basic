{{-- PATIENTS --}}
<h6 class="menu">{{ __('Patients') }}</h6>
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
