<x-layouts.carevise>
    {{-- The content that is placed here, will display as the page title in the browser --}}
    <x-slot:pageTitle>
        {{ __(':user details', ['user' => $user->demographic->complete_name ?? ($user->username ?? 'User')]) }}
    </x-slot>

    {{-- The content that is placed here, will display as the page submenu --}}
    <x-slot:subMenu>users</x-slot>

    {{-- The content that is placed here, will display as the page content --}}
    <div class="user-profile">
        <div class="profile-data">
            <form method="POST" action="{{ route('user.update') }}">
                @csrf
                @method('PATCH')
                <div class="form-column">
                    <div class="card-holder double">
                        <x-forms.input name="username" :label="__('Username')" :value="old('username', $user->username)"
                                       disabled readonly required auto />
                        <x-forms.input name="demographic[email_address][email]" :label="__('E-mail')"
                                       :value="old('demographic.email_address.email', $user->demographic->email_address->email)"
                                       focus required auto />
                    </div>

                    <div class="card-holder double">
                        <x-forms.input name="demographic[last_name]" :label="__('Last name')"
                                       :value="old('demographic.last_name', $user->demographic->last_name)"
                                       required auto />
                        <x-forms.input name="demographic[first_name]" :label="__('First name')"
                                       :value="old('demographic.first_name', $user->demographic->first_name)"
                                       required auto />
                        <x-forms.input name="demographic[middle_name]" :label="__('Middle name')"
                                       :value="old('demographic.middle_name', $user->demographic->middle_name)"
                                       auto />
                    </div>

                    <div class="card-holder double">
                        <x-forms.input name="demographic[birthdate]" :label="__('Birthdate')"
                                       :value="old('demographic.birthdate', $user->demographic->birthdate->format(config('carevise.formats.date')))"
                                       required auto />
                        <x-forms.select name="demographic[gender]" :label="__('Gender')" :items="['male' => 'Male', 'female' => 'Female']"
                                        :value="old('demographic.gender', $user->demographic->gender)"
                                        required auto />
                    </div>

                    <div class="card-holder double">
                        <x-forms.textarea name="demographic[about_me]" :label="__('About me')"
                                          :value="old('demographic.about_me', $user->demographic->about_me)" />
                    </div>
                </div>

                <div class="form-column">

                        <div class="card-holder double">
                            <x-forms.checkbox name="is_active" :label="__('The user is active?')"
                                              :checked="old('is_active', $user->is_active)" auto />
                            <x-forms.checkbox name="is_provider" :label="__('The user is a provider?')"
                                              :checked="old('is_provider', $user->is_provider)" auto />
                        </div>
                        {{--
                        <x-forms.input type="hidden" name="is_active" value="true" auto />
                        <x-forms.input type="hidden" name="is_provider" value="true" auto />
                        --}}

                    <div class="card-holder double address">
                        <div class="block">
                            <x-forms.input name="demographic[address][street]" :label="__('Address')"
                                           :value="old('demographic.address.street', $user->demographic->address->street)"
                                           auto />
                            <x-forms.input name="demographic[address][street_extended]" :label="__('Address extended')"
                                           :value="old('demographic.address.street_extended', $user->demographic->address->street_extended)"
                                           auto />
                        </div>
                        <div class="block">
                            <x-forms.input name="demographic[address][city]" :label="__('City')"
                                           :value="old('demographic.address.city', $user->demographic->address->city)" auto />
                            <x-forms.input name="demographic[address][state]" :label="__('State')"
                                           :value="old('demographic.address.state', $user->demographic->address->state)" auto />
                            <x-forms.input name="demographic[address][postal_code]" :label="__('Postal Code')"
                                           :value="old('demographic.address.postal_code', $user->demographic->address->postal_code)"
                                           auto />
                        </div>
                        <div class="block">
                            <x-forms.select name="demographic[address][country_code]" :label="__('Country')"
                                            :items="['AR' => 'Argentina', 'US' => 'United States of America']"
                                            :value="old('demographic.address.country_code', $user->demographic->address->country_code)"
                                            auto />
                        </div>
                    </div>

                    <div class="card-holder double center phones">
                        <x-forms.input name="demographic[phone][country_code]" :label="__('Phone')" placeholder="+1"
                                       :value="old('demographic.phone.country_code', $user->demographic->phone->country_code)"
                                       maxlength="7" auto />
                        <x-forms.input name="demographic[phone][area_code]" :label="__(' ')" placeholder="999"
                                       :value="old('demographic.phone.area_code', $user->demographic->phone->area_code)"
                                       maxlength="4" auto />
                        <x-forms.input name="demographic[phone][prefix_number]" :label="__(' ')" placeholder="999"
                                       :value="old('demographic.phone.prefix_number', $user->demographic->phone->prefix_number)"
                                       maxlength="5" auto />
                        <x-forms.input name="demographic[phone][line_number]" :label="__(' ')" placeholder="9999"
                                       :value="old('demographic.phone.line_number', $user->demographic->phone->line_number)"
                                       class="split" maxlength="5" auto />

                        <x-forms.input name="demographic[phone][country_code]" :label="__('Cellphone')" placeholder="+1"
                                       :value="old('demographic.cellphone.country_code', $user->demographic->cellphone->country_code)"
                                       maxlength="7" auto />
                        <x-forms.input name="demographic[phone][area_code]" :label="__(' ')" placeholder="999"
                                       :value="old('demographic.cellphone.area_code', $user->demographic->cellphone->area_code)"
                                       maxlength="4" auto />
                        <x-forms.input name="demographic[phone][prefix_number]" :label="__(' ')" placeholder="999"
                                       :value="old('demographic.cellphone.prefix_number', $user->demographic->cellphone->prefix_number)"
                                       maxlength="5" auto />
                        <x-forms.input name="demographic[phone][line_number]" :label="__(' ')" placeholder="9999"
                                       :value="old('demographic.cellphone.line_number', $user->demographic->cellphone->line_number)"
                                       maxlength="5" auto />
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
