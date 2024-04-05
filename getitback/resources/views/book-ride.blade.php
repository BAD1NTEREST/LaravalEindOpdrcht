<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Boek een Rit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-md mx-auto bg-white shadow-md overflow-hidden md:max-w-lg">
            <div class="p-6">
                <form method="POST" action="{{ route('rides.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="pickup_location" class="block text-sm font-medium text-gray-700">Ophaaladres</label>
                        <input type="text" name="pickup_location" id="pickup_location" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                    </div>

                    <div class="mb-4">
                        <label for="dropoff_location" class="block text-sm font-medium text-gray-700">Afleveradres</label>
                        <input type="text" name="dropoff_location" id="dropoff_location" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                    </div>

                    <div class="mb-4">
                        <label for="scheduled_pickup_time" class="block text-sm font-medium text-gray-700">Ophaal tijd</label>
                        <input type="datetime-local" name="scheduled_pickup_time" id="scheduled_pickup_time" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="ml-4 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Boek Rit
                        </button>
                    </div>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
