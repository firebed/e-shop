<li x-data="{ show: false }" x-on:click.prevent="show = !show" x-on:click.outside="if (!mobile) show = false" class="nav-item dropdown">
    <a :class="{'show': show}" class="nav-link dropdown-toggle" href="#" role="button">Βρεφικά ρούχα</a>

    <ul :class="show && 'show'" class="dropdown-menu" x-init="$watch('show', show => updateHeights($el, show))">
        <li x-data="{ show: false }" x-on:click.stop="show = !show" x-on:click.outside="if (!mobile) show = false" class="dropdown">
            <div :class="{'show': show}" class="dropdown-item dropdown-toggle">
                <a class="text-decoration-none text-dark" href="http://localhost:8000/el/kormakia/f/brefiko_agori">Βρεφικό αγόρι 0-36</a>
            </div>

            <ul :class="show && 'show'" class="dropdown-menu" x-init="$watch('show', show => updateHeights($el, show))">
                <li><a class="dropdown-item" href="{{ url(app()->getLocale() . '/oloswmes-formes/f/brefiko_agori') }}">Ολόσωμες φόρμες</a></li>
                <li><a class="dropdown-item" href="{{ url(app()->getLocale() . '/set-rouxalakia/f/brefiko_agori') }}">Σετ ρουχαλάκια</a></li>
                <li><a class="dropdown-item" href="{{ url(app()->getLocale() . '/kormakia/f/brefiko_agori') }}">Κορμάκια</a></li>
                <li><a class="dropdown-item" href="{{ url(app()->getLocale() . '/salopeta/f/brefiko_agori') }}">Σαλοπέτα</a></li>
                <li><a class="dropdown-item" href="{{ url(app()->getLocale() . '/pitzames/f/brefiko_agori') }}">Πιτζάμες</a></li>
                <li><a class="dropdown-item" href="{{ url(app()->getLocale() . '/set-gia-neoggenita/f/brefiko_agori') }}">Σετ για νεογέννητα</a></li>
            </ul>
        </li>

        <li x-data="{ show: false }" x-on:click.stop="show = !show" x-on:click.outside="if (!mobile) show = false" class="dropdown">
            <div :class="{'show': show}" class="dropdown-item dropdown-toggle">
                <a class="text-decoration-none text-dark" href="http://localhost:8000/el/kormakia/f/brefiko_agori">Βρεφικό κορίτσι 0-36</a>
            </div>

            <ul :class="show && 'show'" class="dropdown-menu" x-init="$watch('show', show => updateHeights($el, show))">
                <li><a class="dropdown-item" href="http://localhost:8000/el/kormakia/f/brefiko_agori">Ολόσωμες φόρμες</a></li>
                <li><a class="dropdown-item" href="http://localhost:8000/el/kormakia/f/brefiko_agori">Σετ ρουχαλάκια</a></li>
                <li><a class="dropdown-item" href="http://localhost:8000/el/kormakia/f/brefiko_agori">Κορμάκια</a></li>
                <li><a class="dropdown-item" href="http://localhost:8000/el/kormakia/f/brefiko_agori">Φούστες - Φορέματα</a></li>
                <li><a class="dropdown-item" href="http://localhost:8000/el/kormakia/f/brefiko_agori">Σαλοπέτα</a></li>
                <li><a class="dropdown-item" href="http://localhost:8000/el/kormakia/f/brefiko_agori">Πιτζάμες</a></li>
                <li><a class="dropdown-item" href="http://localhost:8000/el/kormakia/f/brefiko_agori">Σετ για νεογέννητα</a></li>
            </ul>
        </li>
    </ul>
</li>