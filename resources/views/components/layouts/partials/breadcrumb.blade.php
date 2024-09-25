<div class="breadcrumb">
    <x-commons.link class="item" :route="route('dashboard')" target="_self" :title="__('Dashboard')">
        <box-icon name='home'></box-icon>
    </x-commons.link>
    <span class="step">
        <x-commons.link class="item" :route="route('dashboard')" target="_self" :title="__('Patients')">
            {{ __('Patients') }}
        </x-commons.link>
    </span>
    <span class="step">{{ __('List') }}</span>
</div>
