<aside>
    <section class="logo">
        <x-commons.logo/>
    </section>
    <section class="nav">
        <div class="top">
            <h6 class="menu">{{ __('Dashboard') }}</h6>
            <x-commons.link :class="request()->routeIs('dashboard') ? 'item active' : 'item'"
                            :route="route('dashboard')"
                            :title="__('Dashboard')">
                <box-icon name='dashboard' type='solid'></box-icon>
            </x-commons.link>

            <h6 class="menu">{{ __('Patients') }}</h6>
            <x-commons.link :class="request()->routeIs('patient.list') ? 'item active' : 'item'"
                            :route="route('patient.list')"
                            :title="__('List')">
                <box-icon type='solid' name='user-detail'></box-icon>
            </x-commons.link>
            {{-- <x-commons.link :class="request()->routeIs('patients.create') ? 'item active' : 'item'" :route="route('dashboard')"
                            :title="__('Create')">
                <box-icon type='solid' name='user-plus'></box-icon>
            </x-commons.link> --}}

            <h6 class="menu">{{ __('Billing') }}</h6>
            <x-commons.link :class="request()->routeIs('billings.manager') ? 'item active' : 'item'"
                            :route="route('dashboard')"
                            :title="__('Claims manager')">
                <box-icon name='money-withdraw'></box-icon>
            </x-commons.link>
            {{-- <x-commons.link :class="request()->routeIs('billings.payments') ? 'item active' : 'item'" :route="route('dashboard')"
                            :title="__('Post payments')">
                <box-icon name='credit-card'></box-icon>
            </x-commons.link>
            <x-commons.link :class="request()->routeIs('billings.collect') ? 'item active' : 'item'" :route="route('dashboard')"
                            :title="__('Collect payments')">
                <box-icon name='dollar-circle'></box-icon>
            </x-commons.link>
            <x-commons.link :class="request()->routeIs('billings.statements') ? 'item active' : 'item'" :route="route('dashboard')"
                            :title="__('Print statements')">
                <box-icon name='file'></box-icon>
            </x-commons.link>
            <x-commons.link :class="request()->routeIs('billings.letters') ? 'item active' : 'item'" :route="route('dashboard')"
                            :title="__('Print letters')">
                <box-icon name='file-blank'></box-icon>
            </x-commons.link>
            <x-commons.link :class="request()->routeIs('billings.awos') ? 'item active' : 'item'" :route="route('dashboard')"
                            :title="__('Auto write off\'s')">
                <box-icon name='file-find'></box-icon>
            </x-commons.link> --}}

            <h6 class="menu">{{ __('Calendar') }}</h6>
            <x-commons.link :class="request()->routeIs('calendar') ? 'item active' : 'item'"
                            :route="route('dashboard')"
                            :title="__('Calendar')">
                <box-icon name='calendar'></box-icon>
            </x-commons.link>

            <h6 class="menu">{{ __('Reports') }}</h6>
            <x-commons.link :class="request()->routeIs('reports') ? 'item active' : 'item'"
                            :route="route('dashboard')"
                            :title="__('Reports')">
                <box-icon name='line-chart'></box-icon>
            </x-commons.link>

            <h6 class="menu">{{ __('Providers') }}</h6>
            <x-commons.link :class="request()->routeIs('provider.*') ? 'item active' : 'item'"
                            :route="route('provider.list')"
                            :title="__('Providers')">
                <box-icon type='solid' name='user-detail'></box-icon>
            </x-commons.link>

            <h6 class="menu">{{ __('Insurances') }}</h6>
            <x-commons.link :class="request()->routeIs('insurances') ? 'item active' : 'item'"
                            :route="route('dashboard')"
                            :title="__('Insurances')">
                <box-icon name='institution' type='solid'></box-icon>
            </x-commons.link>

            <h6 class="menu">{{ __('Users') }}</h6>
            <x-commons.link :class="request()->routeIs('user.*') ? 'item active' : 'item'"
                            :route="route('user.list')"
                            :title="__('Users')">
                <box-icon type='solid' name='user-detail'></box-icon>
            </x-commons.link>
        </div>
        <div class="bottom">
            <h6 class="menu">{{ __('Settings') }}</h6>
            <x-commons.link :class="request()->routeIs('settings') ? 'item active' : 'item'"
                            :route="route('dashboard')"
                            :title="__('Settings')">
                <box-icon name='cog'></box-icon>
            </x-commons.link>
        </div>
    </section>
</aside>
