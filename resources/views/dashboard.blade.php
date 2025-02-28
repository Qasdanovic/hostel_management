<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="text-center text-white font-bold text-2xl mb-4">Welcome back, Mr. {{ Auth::user()->name }}</div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @php
            $cards = [
                ['route' => 'types.index', 'title' => 'Types', 'count' => $types, 'color' => 'bg-red-500', 'icon' => 'fas fa-list'],
                ['route' => 'capacite.index', 'title' => 'Capacite', 'count' => $capacites, 'color' => 'bg-green-500', 'icon' => 'fas fa-users'],
                ['route' => 'tarifs.index', 'title' => 'Tarifs', 'count' => $tarifs, 'color' => 'bg-blue-500', 'icon' => 'fas fa-dollar-sign'],
                ['route' => 'chambres.index', 'title' => 'Chambres', 'count' => $chambres, 'color' => 'bg-orange-500', 'icon' => 'fas fa-bed'],
                ['route' => 'clients.index', 'title' => 'Clients', 'count' => $clients, 'color' => 'bg-rose-500', 'icon' => 'fas fa-user'],
                // ['route' => 'reservations.index', 'title' => 'Reservations', 'count' => $reservations, 'color' => 'bg-gray-500', 'icon' => 'fa-solid fa-calendar-check'],
            ];
        @endphp

        @foreach ($cards as $card)
            <div class="p-6 rounded-lg shadow-lg {{ $card['color'] }} transform transition duration-500 hover:scale-105">
                <div class="flex items-center space-x-4">
                    <div class="text-white text-4xl">
                        <i class="{{ $card['icon'] }}"></i>
                    </div>
                    <div class="text-white">
                        <a href="{{ route($card['route']) }}" class="text-2xl font-bold hover:underline">{{ $card['title'] }}</a>
                        <p class="font-bold text-lg">{{ $card['count'] }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
