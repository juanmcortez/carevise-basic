{{-- PROVIDERS --}}
<h6 class="menu">{{ __('Providers') }}</h6>
<x-commons.link :class="request()->routeIs('provider.list') ? 'item active' : 'item'" :route="route('provider.list')">
    <box-icon type='solid' name='user-detail'></box-icon>
    {{ __('List') }}
</x-commons.link>
<x-commons.link :class="request()->routeIs('provider.profile.new') ? 'item active' : 'item'"
                :route="route('provider.profile.new')">
    <box-icon type='solid' name='user-plus'></box-icon>
    {{ __('Create') }}
</x-commons.link>


{{-- RECENT PROVIDERS LIST --}}
<h6 class="menu">{{ __('Recently reviewed providers') }}</h6>
@for($i=0; $i<=random_int(0, 9); $i++)
    <x-commons.link :class="request()->routeIs('provider.recent') ? 'item active' : 'item'"
                    :route="route('provider.list')">
        <box-icon name='user-circle'></box-icon>
        {{ __('Recent providers #:idx', ['idx' => ($i+1)]) }}
    </x-commons.link>
@endfor
