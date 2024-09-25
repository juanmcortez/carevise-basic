<x-layouts.carevise>
    {{-- The content that is placed here, will display as the page title in the browser --}}
    <x-slot:pageTitle>
        {{ __('Login') }}
    </x-slot>

    {{-- The content that is placed here, will display as the page content --}}
    <form method="POST" action="{{ route('login') }}" class="login-form">
        @csrf
        <div class="form-content">
            <h2>{{ __('Welcome back!') }}</h2>

            <p><span>{{ __('Please login with your credentials') }}</span></p>

            <x-forms.input name="username" :label="__('Username')" :value="old('username')" :error="$errors" focus required nolbl />
            <x-forms.password name="password" :label="__('Password')" required nolbl />

            <x-forms.checkbox name="remember_me" :label="__('Remember Me')" />

            <x-forms.button type="submit">
                <box-icon name='log-in-circle'></box-icon>
                {{ __('Login') }}
            </x-forms.button>

            <p><span>{{ __('Or') }}</span></p>

            <div class="redirects">
                @if(Route::has('password.request'))
                    <x-commons.link :route="route('password.request')">
                        <box-icon type='solid' name='lock-open'></box-icon>
                        {{ __('Forgot your password?') }}
                    </x-commons.link>
                @endif
                <x-commons.link :route="route('register')">
                    <box-icon type='solid' name='user-plus'></box-icon>
                    {{ __('Create your account!') }}
                </x-commons.link>
            </div>
        </div>
    </form>
</x-layouts.carevise>
