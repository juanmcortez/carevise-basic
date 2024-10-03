<h6 class="menu">{{ __('Providers') }}</h6>
<x-commons.link :class="request()->routeIs('user.list') ? 'item active' : 'item'" :route="route('user.list')">
    <box-icon type='solid' name='user-detail'></box-icon>
    {{ __('List') }}
</x-commons.link>
<x-commons.link :class="request()->routeIs('user.profile.new') ? 'item active' : 'item'"
                :route="route('user.profile.new')">
    <box-icon type='solid' name='user-plus'></box-icon>
    {{ __('Create') }}
</x-commons.link>
