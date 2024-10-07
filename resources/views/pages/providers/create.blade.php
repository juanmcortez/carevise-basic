<x-layouts.carevise>
    {{-- The content that is placed here, will display as the page title in the browser --}}
    <x-slot:pageTitle>
        {{ __('New provider details') }}
    </x-slot>

    {{-- The content that is placed here, will display as the page submenu --}}
    <x-slot:subMenu>provider</x-slot>

    {{-- The content that is placed here, will display as the page content --}}
    <div class="user-profile">
        <div class="profile-data">
            <form method="POST" action="{{ route('provider.create') }}">
                @csrf
                <div class="form-column">
                    <div class="card-holder double">
                        <x-forms.input name="user[username]" :label="__('Username')" :value="old('user.username')" focus
                                       required auto/>
                        <x-forms.input name="user[demographic][email_address][email]" :label="__('E-mail')"
                                       :value="old('user.demographic.email_address.email')"
                                       required auto/>
                    </div>

                    <div class="card-holder double">
                        <x-forms.password name="user[password]" :label="__('Password')" required auto/>
                        <x-forms.password name="user[password_confirmation]" :label="__('Confirm password')" required
                                          auto/>
                    </div>

                    <div class="card-holder double">
                        <x-forms.input name="user[demographic][last_name]" :label="__('Last name')"
                                       :value="old('user.demographic.last_name')" required auto/>
                        <x-forms.input name="user[demographic][first_name]" :label="__('First name')"
                                       :value="old('user.demographic.first_name')" required auto/>
                        <x-forms.input name="user[demographic][middle_name]" :label="__('Middle name')"
                                       :value="old('user.demographic.middle_name')" auto/>
                    </div>

                    <div class="card-holder double">
                        <x-forms.input name="user[demographic][birthdate]" :label="__('Birthdate')"
                                       :value="old('user.demographic.birthdate')" required auto/>
                        <x-forms.select name="user[demographic][gender]" :label="__('Gender')"
                                        :items="['male' => 'Male', 'female' => 'Female']"
                                        :value="old('user.demographic.gender')" required auto/>
                    </div>

                    <div class="card-holder double">
                        <x-forms.input name="npi" :label="__('NPI')" :value="old('npi')" required auto/>
                        <x-forms.input name="taxonomy" :label="__('Taxonomy')" :value="old('taxonomy')" auto/>
                    </div>

                    <div class="card-holder double">
                        <x-forms.input name="federal_tax" :label="__('Federal Tax')" :value="old('federal_tax')" auto/>
                        <x-forms.select name="specialty" :label="__('Specialty')" :value="old('specialty')" auto/>
                    </div>

                    <div class="card-holder double">
                        <x-forms.checkbox name="is_calendar_active" :label="__('The calendar is active?')"
                                          :checked="old('is_calendar_active')" auto/>
                    </div>
                </div>

                <div class="form-column">


                    <div class="card-holder double">
                        <x-forms.checkbox name="user[is_active]" :label="__('The user is active?')"
                                          :checked="old('user.is_active')" checked auto readonly/>
                        <x-forms.checkbox name="user[is_provider]" :label="__('The user is a provider?')"
                                          :checked="old('user.is_provider')" checked auto readonly/>
                    </div>

                    <div class="card-holder double address">
                        <div class="block">
                            <x-forms.input name="user[demographic][address][street]" :label="__('Address')"
                                           :value="old('user.demographic.address.street')" auto/>
                            <x-forms.input name="user[demographic][address][street_extended]"
                                           :label="__('Address extended')"
                                           :value="old('user.demographic.address.street_extended')" auto/>
                        </div>
                        <div class="block">
                            <x-forms.input name="user[demographic][address][city]" :label="__('City')"
                                           :value="old('user.demographic.address.city')" auto/>
                            <x-forms.input name="user[demographic][address][state]" :label="__('State')"
                                           :value="old('user.demographic.address.state')" auto/>
                            <x-forms.input name="user[demographic][address][postal_code]" :label="__('Postal Code')"
                                           :value="old('user.demographic.address.postal_code')" auto/>
                        </div>
                        <div class="block">
                            <x-forms.select name="user[demographic][address][country_code]" :label="__('Country')"
                                            :items="['ar' => 'Argentina', 'us' => 'United States of America']"
                                            :value="old('user.demographic.address.country_code')" auto/>
                        </div>
                    </div>

                    <div class="card-holder double center phones">
                        <x-forms.phone name="user[demographic][phone]" :label="__('Phone')"
                                       value="user.demographic.phone" split/>
                        <x-forms.phone name="user[demographic][cellphone]" :label="__('Cellphone')"
                                       value="user.demographic.cellphone"/>
                    </div>


                    <div class="card-holder double">
                        <x-forms.textarea name="user[demographic][about_me]" :label="__('About me')"
                                          :value="old('user.demographic.about_me')"/>
                    </div>


                    <div class="card-holder double">
                        <x-forms.button type="submit">
                            <box-icon name='save'></box-icon>
                            {{ __('Create Provider') }}
                        </x-forms.button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layouts.carevise>
