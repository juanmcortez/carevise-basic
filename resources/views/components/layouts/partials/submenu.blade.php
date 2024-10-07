@props(['items' => null])
@if ($items)
    <aside class="submenu">
        <section class="nav">
            @includeWhen((str()->lower($items) == 'patient' || str()->lower($slot) == 'patient'), 'components.layouts.submenus.patients')
            @includeWhen((str()->lower($items) == 'user' || str()->lower($slot) == 'user'), 'components.layouts.submenus.users')
            @includeWhen((str()->lower($items) == 'provider' || str()->lower($slot) == 'provider'), 'components.layouts.submenus.providers')
        </section>
    </aside>
@endif
