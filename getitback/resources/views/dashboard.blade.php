<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Geplande Ritten -->
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Geplande Ritten</h3>
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($geplandeRitten as $rit)
                            <li>
                                {{ $rit->pickup_location }} naar {{ $rit->dropoff_location }}
                                - Gepland op: {{ $rit->scheduled_pickup_time }}
                                - Kosten: €{{ number_format($rit->cost, 2) }}
                            </li>
                        @endforeach
                    </ul>
                    <!-- Lopende Ritten -->
                    <h3 class="text-lg leading-6 font-medium text-gray-900 mt-6">Lopende Ritten</h3>
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($lopendeRitten as $rit)
                            <li>
                                {{ $rit->pickup_location }} naar {{ $rit->dropoff_location }}
                                - Starttijd: {{ $rit->scheduled_pickup_time->format('d-m-Y H:i') }}
                                - Kosten: €{{ number_format($rit->cost, 2) }}
                            </li>
                        @endforeach
                    </ul>

                    <!-- Uitgevoerde Ritten -->
                    <h3 class="text-lg leading-6 font-medium text-gray-900 mt-6">Uitgevoerde Ritten</h3>
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($uitgevoerdeRitten as $rit)
                            <li>
                                {{ $rit->pickup_location }} naar {{ $rit->dropoff_location }}
                                - Afgerond op: {{ $rit->scheduled_dropoff_time->format('d-m-Y H:i') }}
                                - Kosten: €{{ number_format($rit->cost, 2) }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
