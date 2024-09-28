<x-layouts.carevise>
    {{-- The content that is placed here, will display as the page title in the browser --}}
    <x-slot:pageTitle>
        {{ __('New user details') }}
    </x-slot>

    {{-- The content that is placed here, will display as the page submenu --}}
    <x-slot:subMenu>user</x-slot>

    {{-- The content that is placed here, will display as the page content --}}
    <div class="user-profile">
        <div class="profile-data">
            <form method="POST" action="{{ route('user.create') }}">
                @csrf
                <div class="form-column">
                    <div class="card-holder double">
                        <x-forms.input name="username" :label="__('Username')" :value="old('username')" focus required
                                       auto/>
                        <x-forms.input name="demographic[email_address][email]" :label="__('E-mail')"
                                       :value="old('demographic.email_address.email')" required auto/>
                    </div>

                    <div class="card-holder double">
                        <x-forms.password name="password" :label="__('Password')" required auto/>
                        <x-forms.password name="password_confirmation" :label="__('Confirm password')" required auto/>
                    </div>

                    <div class="card-holder double">
                        <x-forms.input name="demographic[last_name]" :label="__('Last name')"
                                       :value="old('demographic.last_name')" required auto/>
                        <x-forms.input name="demographic[first_name]" :label="__('First name')"
                                       :value="old('demographic.first_name')" required auto/>
                        <x-forms.input name="demographic[middle_name]" :label="__('Middle name')"
                                       :value="old('demographic.middle_name')" auto/>
                    </div>

                    <div class="card-holder double">
                        <x-forms.input name="demographic[birthdate]" :label="__('Birthdate')"
                                       :value="old('demographic.birthdate')" required auto/>
                        <x-forms.select name="demographic[gender]" :label="__('Gender')"
                                        :items="['male' => 'Male', 'female' => 'Female']"
                                        :value="old('demographic.gender')" required auto/>
                    </div>

                    <div class="card-holder double">
                        <x-forms.textarea name="demographic[about_me]" :label="__('About me')"
                                          :value="old('demographic.about_me')" auto/>
                    </div>
                </div>

                <div class="form-column">

                    <div class="card-holder double">
                        <x-forms.checkbox name="is_active" :label="__('The user is active?')"
                                          :checked="old('is_active')" checked disabled readonly auto/>
                        <x-forms.checkbox name="is_provider" :label="__('The user is a provider?')"
                                          :checked="old('is_provider')" disabled readonly auto/>
                    </div>

                    <div class="card-holder double address">
                        <div class="block">
                            <x-forms.input name="demographic[address][street]" :label="__('Address')"
                                           :value="old('demographic.address.street')" auto/>
                            <x-forms.input name="demographic[address][street_extended]" :label="__('Address extended')"
                                           :value="old('demographic.address.street_extended')" auto/>
                        </div>
                        <div class="block">
                            <x-forms.input name="demographic[address][city]" :label="__('City')"
                                           :value="old('demographic.address.city')" auto/>
                            <x-forms.input name="demographic[address][state]" :label="__('State')"
                                           :value="old('demographic.address.state')" auto/>
                            <x-forms.input name="demographic[address][postal_code]" :label="__('Postal Code')"
                                           :value="old('demographic.address.postal_code')" auto/>
                        </div>
                        <div class="block">
                            <x-forms.select name="demographic[address][country_code]" :label="__('Country')"
                                            :items="['ar' => 'Argentina', 'us' => 'United States of America']"
                                            :value="old('demographic.address.country_code')" auto/>
                        </div>
                    </div>

                    <div class="card-holder double center phones">
                        <x-forms.phone name="demographic[phone]" :label="__('Phone')"
                                       value="demographic.phone" split/>
                        <x-forms.phone name="demographic[cellphone]" :label="__('Cellphone')"
                                       value="demographic.cellphone"/>
                    </div>

                    <div class="card-holder double">
                        <x-forms.button type="submit">
                            <box-icon name='save'></box-icon>
                            {{ __('Profile update') }}
                        </x-forms.button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layouts.carevise>
