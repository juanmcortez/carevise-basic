<h6 class="menu">{{ (Auth::user()->demographic->complete_name) ?? Auth::user()->username }}</h6>
<x-commons.link :class="request()->routeIs('user.self.edit') ? 'item active' : 'item'"
                :route="route('user.self.edit')">
    <box-icon type='solid' name='user'></box-icon>
    {{ __('Profile details') }}
</x-commons.link>
<x-commons.link :class="request()->routeIs('dashboard') ? 'item active' : 'item'"
                :route="route('dashboard')">
    <box-icon type='solid' name='cog'></box-icon>
    {{ __('Profile options') }}
</x-commons.link>
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <x-commons.link class="item" :href="route('logout')"
                    onclick="event.preventDefault(); this.closest('form').submit();">
        <box-icon name='log-out-circle'></box-icon>
        {{ __('Log Out') }}
    </x-commons.link>
</form>
<h6 class="menu">{{ __('Users') }}</h6>
<x-commons.link :class="request()->routeIs('user.list') ? 'item active' : 'item'" :route="route('user.list')">
    <box-icon type='solid' name='user-detail'></box-icon>
    {{ __('List') }}
</x-commons.link>
<x-commons.link :class="request()->routeIs('user.profile.new') ? 'item active' : 'item'"
                :route="route('user.profile.new')">
    <box-icon type='solid' name='user-plus'></box-icon>
    {{ __('Create') }}
</x-commons.link>
