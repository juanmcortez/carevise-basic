<x-layouts.carevise>
    {{-- The content that is placed here, will display as the page title in the browser --}}
    <x-slot:pageTitle>
        {{ __('Patient account') }}
    </x-slot>

    {{-- The content that is placed here, will display as the page submenu --}}
    <x-slot:subMenu>patient</x-slot>

    {{-- The content that is placed here, will display as the page content --}}
    <div class="patient-profile">
        <x-tables.simple class="account-details mb-6"
                         :columnsWidth="['w-[12.5%]', 'w-[12.5%]', 'w-[12.5%]', 'w-[12.5%]', 'w-[12.5%]', 'w-[12.5%]', 'w-[12.5%]', 'w-[12.5%]']"
                         :columnsLabel="['Balance', 'Total', 'Un-billed', 'Current', '>30 Days', '>60 Days', '>90 Days', '>120 Days']">
            <tr>
                <td class="!text-left">{{ __('Insurance') }}</td>
                <td>$ 0.00</td>
                <td>$ 0.00</td>
                <td>$ 0.00</td>
                <td>$ 0.00</td>
                <td>$ 0.00</td>
                <td>$ 0.00</td>
                <td>$ 0.00</td>
            </tr>
            <tr>
                <td class="!text-left">{{ __('Patient') }}</td>
                <td>$ 0.00</td>
                <td>$ 0.00</td>
                <td>$ 0.00</td>
                <td>$ 0.00</td>
                <td>$ 0.00</td>
                <td>$ 0.00</td>
                <td>$ 0.00</td>
            </tr>
            <tr>
                <td class="!text-left">{{ __('Account') }}</td>
                <td>$ 0.00</td>
                <td>$ 0.00</td>
                <td>$ 0.00</td>
                <td>$ 0.00</td>
                <td>$ 0.00</td>
                <td>$ 0.00</td>
                <td>$ 0.00</td>
            </tr>
        </x-tables.simple>

        <div class="w-full flex flex-row mb-6">
            <div class="w-1/12 text-center pr-2">
                <x-forms.button class="!bg-accent !mb-0">
                    <box-icon name='list-plus'></box-icon>{{ __('Invoice') }}
                </x-forms.button>
            </div>
            <div class="w-1/12 text-center pr-2">
                <x-forms.button class="!bg-warning !mb-0">
                    <box-icon name='barcode'></box-icon>{{ __('Action') }}
                </x-forms.button>
            </div>
            <div class="w-1/12 text-center pr-2">
                <x-forms.button class="!bg-warning !mb-0">
                    <box-icon name='comment-x'></box-icon>{{ __('Clear') }}
                </x-forms.button>
            </div>
            <div class="w-1/12 text-center pr-2">
                <x-forms.button class="!bg-warning !mb-0">
                    <box-icon name='refresh'></box-icon>{{ __('Unbill') }}
                </x-forms.button>
            </div>
            <div class="w-3/12 text-center pr-2">&nbsp;</div>
            <div class="w-1/12 text-center pr-2">
                <x-forms.button class="!bg-success !mb-0">
                    <box-icon name='file'></box-icon>{{ __('Statement') }}
                </x-forms.button>
            </div>
            <div class="w-1/12 text-center pr-2">
                <x-forms.button class="!bg-success !mb-0">
                    <box-icon name='file'></box-icon>{{ __('Bill') }}
                </x-forms.button>
            </div>
            <div class="w-1/12 text-center pr-2">
                <x-forms.button class="!bg-success !mb-0">
                    <box-icon name='file'></box-icon>{{ __('Letter') }}
                </x-forms.button>
            </div>
            <div class="w-1/12 text-center pr-2">
                <x-forms.button class="!bg-success !mb-0">
                    <box-icon name='printer'></box-icon>{{ __('Print') }}
                </x-forms.button>
            </div>
            <div class="w-1/12 text-center">
                <x-forms.button class="!bg-info !mb-0">
                    <box-icon name='select-multiple'></box-icon>
                    {{ __('Select all') }}
                </x-forms.button>
            </div>
        </div>

        <x-tables.simple class="account-details"
                         :columnsWidth="[
                            'w-[6.4%]', 'w-[6.4%]', 'w-[6.4%]', 'w-[6.4%]', 'w-[6.4%]', 'w-[6.4%]', 'w-[6.4%]',
                            'w-[6.4%]', 'w-[6.4%]', 'w-[6.4%]', 'w-[6.4%]', 'w-[6.4%]', 'w-[6.4%]', 'w-[6.4%]',
                            'w-[6.4%]', ''
                         ]"
                         :columnsLabel="[
                            'Inv. #', 'DOS', 'CPT', 'Mods.', 'ICDs', 'Prov.', 'Qty.',
                            'Charge', 'PTP', 'PBR', 'Paid', 'Adj.', 'Bal.', 'DOE',
                            'Ins.', ''
                         ]">
            <tr>
                <td colspan="16" class="!text-center">{{ __('There are no invoices to display') }}</td>
            </tr>
        </x-tables.simple>
    </div>
</x-layouts.carevise>
