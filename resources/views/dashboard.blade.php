<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

<<<<<<< HEAD
    <div class="py-12 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Welcome Message -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 mb-8">
                <div class="flex items-center space-x-4">
                    <div class="p-3 bg-blue-500 rounded-full">
                        <i class="fas fa-user-circle text-white text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Welcome back,</h3>
                        <p class="text-2xl font-bold text-blue-600 dark:text-blue-400">{{ Auth::user()->name }}</p>
                    </div>
=======
    <div class="py-12 gap-4 flex">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 w-full text-center">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('types.index') }}" class="text-xl">types</a>
                    <p></p>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8  w-full">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    <div class="py-12 gap-4 flex">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 w-full">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8  w-full">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
>>>>>>> c8cbc06 (7- create show page for each controller)
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @php
                    $cards = [
                        ['route' => 'types.index', 'title' => 'Room Types', 'count' => $types, 'color' => 'bg-gradient-to-br from-red-500 to-red-600', 'icon' => 'fas fa-list'],
                        ['route' => 'capacite.index', 'title' => 'Capacity', 'count' => $capacites, 'color' => 'bg-gradient-to-br from-green-500 to-green-600', 'icon' => 'fas fa-users'],
                        ['route' => 'tarifs.index', 'title' => 'Pricing', 'count' => $tarifs, 'color' => 'bg-gradient-to-br from-blue-500 to-blue-600', 'icon' => 'fas fa-dollar-sign'],
                        ['route' => 'chambres.index', 'title' => 'Rooms', 'count' => $chambres, 'color' => 'bg-gradient-to-br from-orange-500 to-orange-600', 'icon' => 'fas fa-bed'],
                        ['route' => 'clients.index', 'title' => 'Clients', 'count' => $clients, 'color' => 'bg-gradient-to-br from-purple-500 to-purple-600', 'icon' => 'fas fa-user'],
                        ['route' => 'reservations.index', 'title' => 'reservations', 'count' => $reservations, 'color' => 'bg-gradient-to-br from-fuchsia-500 to-fuchsia-600', 'icon' => 'fas fa-hotel'],
                    ];
                @endphp

                @foreach ($cards as $card)
                    <div class="relative overflow-hidden rounded-xl shadow-sm hover:shadow-lg transition-all duration-300">
                        <div class="p-6 {{ $card['color'] }}">
                            <div class="flex items-center justify-between">
                                <div class="flex-1">
                                    <h3 class="text-lg font-semibold text-white mb-1">{{ $card['title'] }}</h3>
                                    <p class="text-3xl font-bold text-white">{{ number_format($card['count']) }}</p>
                                </div>
                                <div class="text-white text-3xl opacity-80">
                                    <i class="{{ $card['icon'] }}"></i>
                                </div>
                            </div>
                            <a href="{{ route($card['route']) }}" 
                               class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-0 hover:bg-opacity-10 transition-all duration-300">
                                <span class="sr-only">View {{ $card['title'] }}</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
