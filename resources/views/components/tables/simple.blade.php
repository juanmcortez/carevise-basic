@props([
    'columnsNumber' => 1,
    'columnsLabel' => [],
    'columnsWidth' => [],
    'pagination' => false,
])
@php
    if ($columnsNumber === 1 && count($columnsLabel) > 1) {
        $columnsNumber = count($columnsLabel);
    }
@endphp
<table {{ $attributes->merge(['class' => '', 'id' => 'table', 'cellpadding' => '0', 'cellspacing' => '0', 'border' => '0']) }}>
    <thead>
    <tr>
        @for ($idx = 0; $idx < $columnsNumber; $idx++)
            <th class="{{ $columnsWidth[$idx] }}">
                @if (!empty($columnsLabel[$idx]))
                    {{ __($columnsLabel[$idx]) }}
                @else
                    &nbsp;
                @endif
            </th>
        @endfor
    </tr>
    </thead>

    <tbody>
    {{ $slot }}
    </tbody>

    @if (!empty($pagination))
        <tfoot>
        <tr>
            <td colspan="{{ $columnsNumber }}">
                {!! $pagination !!}
            </td>
        </tr>
        </tfoot>
    @endif
</table>
