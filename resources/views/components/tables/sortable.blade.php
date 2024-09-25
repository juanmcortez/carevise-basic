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
                    <span class="sort">
                        <div class="label">{{ __($columnsLabel[$idx]) }}</div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                <polygon points="16,4 23,11 21.6,12.4 16,6.8 10.4,12.4 9,11 "></polygon>
                                <polygon points="16,28 9,21 10.4,19.6 16,25.2 21.6,19.6 23,21 "></polygon>
                                    <rect width="32" height="32" fill="none"></rect>
                            </svg>
                    </span>
                    <span class="sort-asc">
                        <div class="label">{{ __($columnsLabel[$idx]) }}</div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                <polygon points="16,4 23,11 21.6,12.4 16,6.8 10.4,12.4 9,11 "></polygon>
                                <rect width="32" height="32" fill="none"></rect>
                            </svg>
                    </span>
                    <span class="sort-desc">
                        <div class="label">{{ __($columnsLabel[$idx]) }}</div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                <polygon points="16,28 9,21 10.4,19.6 16,25.2 21.6,19.6 23,21 "></polygon>
                                <rect width="32" height="32" fill="none"></rect>
                            </svg>
                    </span>
                @else
                    <span>&nbsp;</span>
                @endif
            </th>
        @endfor
    </tr>
    </thead>

    <tbody>
    {{ $slot }}
    </tbody>

    @if ($pagination)
        <tfoot>
        <tr>
            <td colspan="{{ $columnsNumber }}">
                {!! $pagination !!}
            </td>
        </tr>
        </tfoot>
    @endif
</table>
