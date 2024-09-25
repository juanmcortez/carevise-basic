@props(['pageH1' => null])
<div class="header">
    <h1 @Guest class="centered" @endGuest>
        @Auth
            @empty($pageH1)
                {{ config('carevise.short-name', config('carevise.name', 'Carevise')) }}
            @else
                {!! $pageH1 !!}
            @endempty
        @endAuth
        @Guest
            <x-commons.logo />
            {{ config('carevise.name', 'Carevise') }}
        @endGuest
    </h1>
    @Auth
        <div class="subtools">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-commons.link class="item" :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-commons.link>
            </form>
            <!-- User Dropdown -->
            {{-- <x-tools.user-dropdown :userdata="Auth::user()" /> --}}
        </div>
    @endAuth
</div>
