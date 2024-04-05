<nav>
    <!-- Andere nav links... -->
    <x-nav-link :href="route('admin.options.index')" :active="request()->routeIs('admin.options.index')">
        Opties Instellen
    </x-nav-link>
    <!-- Nog meer nav links... -->
</nav>

<x-nav-link :href="route('admin.rides.index')" :active="request()->routeIs('admin.rides.index')">
    Ritten Beheer
</x-nav-link>
