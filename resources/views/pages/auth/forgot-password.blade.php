<x-layouts.carevise>
    {{-- The content that is placed here, will display as the page title in the browser --}}
    <x-slot:pageTitle>
        {{ __('Login') }}
    </x-slot>

    {{-- The content that is placed here, will display as the page content --}}
    <form method="POST" action="{{ route('password.request') }}" class="login-form">
        @csrf
        <div class="form-content">
            <h2>{{ __('Forgot password?') }}</h2>

            <p><span>{{ __('Reset your account via your e-mail') }}</span></p>

            <x-forms.input name="email" :label="__('E-mail')" :value="old('email')" focus required auto nolbl />

            <x-forms.button type="submit">
                <box-icon type='solid' name='lock-open'></box-icon>
                {{ __('Reset') }}
            </x-forms.button>

            <p><span>{{ __('Or') }}</span></p>

            <div class="redirects">
                <x-commons.link :route="route('login')">
                    <box-icon name='log-in-circle'></box-icon>
                    {{ __('Login to your account!') }}
                </x-commons.link>
                <x-commons.link :route="route('register')">
                    <box-icon type='solid' name='user-plus'></box-icon>
                    {{ __('Create your account!') }}
                </x-commons.link>
            </div>
        </div>
    </form>
</x-layouts.carevise>
