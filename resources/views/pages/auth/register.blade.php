<x-layouts.carevise>
    {{-- The content that is placed here, will display as the page title in the browser --}}
    <x-slot:pageTitle>
        {{ __('Register your account') }}
    </x-slot>

    {{-- The content that is placed here, will display as the page content --}}
    <form method="POST" action="{{ route('register') }}" class="login-form">
        @csrf
        <div class="form-content">
            <h2>{{ __('Register') }}</h2>

            <p><span>{{ __('Register your new credentials') }}</span></p>

            <x-forms.input name="username" :label="__('Username')" :value="old('username')" focus required auto nolbl />
            <x-forms.input name="email" :label="__('E-mail')" :value="old('email')" required auto nolbl />

            <div class="flex flex-row space-x-6">
                <x-forms.input name="last_name" :label="__('Last name')" :value="old('last_name')" required auto nolbl />
                <x-forms.input name="first_name" :label="__('First name')" :value="old('first_name')" required auto nolbl />
                <x-forms.input name="middle_name" :label="__('Middle name')" :value="old('middle_name')" auto nolbl />
            </div>

            <x-forms.password name="password" :label="__('Password')" required auto nolbl />
            <x-forms.password name="password_confirmation" :label="__('Confirm password')" required auto nolbl />

            <x-forms.button type="submit">
                <box-icon name='user-plus'></box-icon>
                {{ __('Register') }}
            </x-forms.button>

            <p><span>{{ __('Or') }}</span></p>

            <div class="redirects">
                @if(Route::has('password.request'))
                    <x-commons.link :route="route('password.request')">
                        <box-icon type='solid' name='lock-open'></box-icon>
                        {{ __('Forgot your password?') }}
                    </x-commons.link>
                @endif
                <x-commons.link :route="route('login')">
                    <box-icon name='log-in-circle'></box-icon>
                    {{ __('Login to your account!') }}
                </x-commons.link>
            </div>
        </div>
    </form>
</x-layouts.carevise>
