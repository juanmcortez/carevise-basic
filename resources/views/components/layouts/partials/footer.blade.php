<footer>
    <section class="left">
        <x-commons.logo />
        <span>{{ config('carevise.short-name', config('carevise.name', 'Carevise')) }}&nbsp;&copy;&nbsp;{{ date('Y') }}</span>
    </section>
    <section class="right">
        <span>{{ config('carevise.address') }}&nbsp;&nbsp;{{ config('carevise.phone') }}</span>
        <x-commons.link :route="config('carevise.github')" target="_blank">
            <box-icon type='logo' name='github'></box-icon>
        </x-commons.link>
        <x-commons.link :route="config('carevise.gitlab')" target="_blank">
            <box-icon type='logo' name='gitlab'></box-icon>
        </x-commons.link>
        <x-commons.link :route="config('carevise.instagram')" target="_blank">
            <box-icon type='logo' name="instagram"></box-icon>
        </x-commons.link>
        <x-commons.link :route="config('carevise.X')" target="_blank">
            <box-icon type='logo' name='twitter'></box-icon>
        </x-commons.link>
        <x-commons.link :route="config('carevise.facebook')" target="_blank">
            <box-icon name='facebook-circle' type='logo'></box-icon>
        </x-commons.link>
    </section>
</footer>
