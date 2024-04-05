{{-- resources/views/admin/dashboard.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <!-- Your admin dashboard content should go here -->
        <!-- Assuming you're extending the app layout in your admin views -->
<x-nav-link :href="route('admin.options.index')" :active="request()->routeIs('admin.options.index')">
    Kilometerprijs Instellen
</x-nav-link>
<x-nav-link :href="route('admin.rides.index')" :active="request()->routeIs('admin.rides.index')">
    Rittenn checken
</x-nav-link>
    </div>
</x-app-layout>
