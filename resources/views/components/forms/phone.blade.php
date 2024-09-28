@props([
    'name' => null,
    'label' => null,
    'value' => null,
    'class' => null,
    'split' => false,
    'old' => false,
])
@php
    $oldCountryCode     = (!$old) ? old($value.'.country_code') : old($value.'.country_code', $old->country_code);
    $oldAreaCode        = (!$old) ? old($value.'.area_code') : old($value.'.area_code', $old->area_code);
    $oldPrefixNumber    = (!$old) ? old($value.'.prefix_number') : old($value.'.prefix_number', $old->prefix_number);
    $oldLineNumber      = (!$old) ? old($value.'.line_number') : old($value.'.line_number', $old->line_number);
@endphp
<x-forms.input name="{{ $name }}[country_code]" label="{{ $label }}" placeholder="+1"
               value="{{ $oldCountryCode }}" maxlength="7" auto/>
<x-forms.input name="{{ $name }}[area_code]" :label="__(' ')" placeholder="999"
               value="{{ $oldAreaCode }}" maxlength="4" auto/>
<x-forms.input name="{{ $name }}[prefix_number]" :label="__(' ')" placeholder="999"
               value="{{ $oldPrefixNumber }}" maxlength="5" auto/>
<x-forms.input name="{{ $name }}[line_number]" :label="__(' ')" placeholder="9999"
               value="{{ $oldLineNumber }}" maxlength="5" auto/>
@if($split)
    <span class="split">&nbsp;</span>
@endif
