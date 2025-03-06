<x-app-layout>
    <x-slot:header>
        <h2 class="text-2xl font-bold text-gray-200 dark:text-gray-100 leading-tight tracking-wide">
            Gestion des Reservations
        </h2>
    </x-slot:header>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex justify-between items-center mb-8">
            <a href="{{ route('reservations.create') }}" class="px-8 py-4">
                <x-button-edit class="flex items-center gap-2  bg-blue-600 w-full hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-800 transition-colors duration-200 text-white font-semibold rounded-lg shadow-lg">
                    Nouvelle réservation
                </x-button-edit>
            </a>
        </div>

        @if(session()->has('success'))
            <div class="mb-6 p-4 rounded-lg bg-green-100 dark:bg-green-900 border-l-4 border-green-500">
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <p class="text-green-700 dark:text-green-300 font-medium">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        @if(session()->has('error'))
            <div class="mb-6 p-4 rounded-lg bg-red-100 dark:bg-red-900 border-l-4 border-red-500">
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <p class="text-red-700 dark:text-red-300 font-medium">{{ session('error') }}</p>
                </div>
            </div>
        @endif

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mb-6">
            <form action="{{ route('reservations.index') }}" method="GET" class="flex gap-4 items-center">
                <select name="etat" class="flex-1 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 transition-colors duration-200" onchange="this.form.submit()">
                    <option value="">Filtrer par état</option>
                    <option value="Planifie" {{ request('etat') == 'Planifie' ? 'selected' : '' }}>Planifiées</option>
                    <option value="En cours" {{ request('etat') == 'En cours' ? 'selected' : '' }}>En cours</option>
                    <option value="Terminee" {{ request('etat') == 'Terminee' ? 'selected' : '' }}>Terminées</option>
                </select>
                <button type="submit" class="bg-blue-700 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded">
                    Filtrer
                </button>
                <a href="{{route('reservations.index')}}" class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded">
                    Annuler
                </a>
            </form>
        </div>
        <div class="mb-4">
            <form action="{{ route('reservations.index') }}" method="GET" class="flex gap-4 items-center bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <div class="flex-1">
                <label for="date_debut" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Du</label>
                <input type="date" name="date_debut" id="date_debut" class="mt-1 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 w-full transition-colors duration-200">
            </div>
            <div class="flex-1">
                <label for="date_fin" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Au</label>
                <input type="date" name="date_fin" id="date_fin" class="mt-1 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 w-full transition-colors duration-200">
            </div>
            <div class="flex-1">
                <label for="chambre_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Numéro de la chambre</label>
                <select name="chambre_id" id="chambre_id" class="mt-1 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 w-full transition-colors duration-200">
                <option value="">Choisir un numéro de chambre</option>
                @foreach($chambres as $chambre)
                    <option value="{{ $chambre->id }}" {{ request('chambre_id') == $chambre->id ? 'selected' : '' }}>
                    {{ $chambre->numero_chambre }}
                    </option>
                @endforeach
                </select>
            </div>
            <div class="flex-1">
                <label for="client_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Client</label>
                <select name="client_id" id="client_id" class="mt-1 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 w-full transition-colors duration-200">
                <option value="">Choisir un client</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ request('client_id') == $client->id ? 'selected' : '' }}>
                    {{ $client->nom_complet }}
                    </option>
                @endforeach
                </select>
            </div>
            <div class="flex items-end">
                <button type="submit" class="bg-blue-700 hover:bg-blue-500 text-white font-bold mt-4 py-2.5 px-4 rounded-lg transition-colors duration-200">
                Rechercher
                </button>
            </div>
            </form>
        </div>
        @if ($reservations->count() > 0)
            <table class="min-w-full border border-gray-300 bg-white text-center">
                <thead class="bg-gray-300">
                    <tr>
                        <x-th>ID</x-th>
                        <x-th>Date de réservation</x-th>
                        <x-th>Date d'arrivée</x-th>
                        <x-th>Date de départ</x-th>
                        <x-th>Nombre de jours</x-th>
                        <x-th>Nom du client</x-th>
                        <x-th>Téléphone</x-th>
                        <x-th>Numéro de chambre</x-th>
                        <x-th>Prix</x-th>
                        <x-th>Actions</x-th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $res)
                        <tr class="bg-gray-200 border-b border-gray-400">
                            <x-td>{{ $res->id }}</x-td>
                            <x-td>{{ $res->Date_heure_reservation }}</x-td>
                            <x-td>{{ $res->Date_arrivee }}</x-td>
                            <x-td>{{ $res->Date_depart }}</x-td>
                            <x-td>{{ $res->Nbr_jours }}</x-td>
                            <x-td>{{ $res->client->nom_complet }}</x-td>
                            <x-td>{{ $res->client->telephone }}</x-td>
                            <x-td>{{ $res->chambre->numero_chambre }}</x-td>
                            <x-td>{{ $res->Montant_total }} DH</x-td>
                            <x-td class="flex justify-center gap-4 items-center">
                                <a href="{{ route('reservations.edit', $res->id) }}">
                                    <x-button-edit>
                                        Éditer
                                    </x-button-edit>
                                </a>
                                <form action="{{ route('reservations.destroy', $res->id) }}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <x-button-delete class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                        Supprimer
                                    </x-button-delete>
                                </form>
                                <a href="{{ route('reservations.show', $res->id) }}">
                                    <x-button-details class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                        Détails
                                    </x-button-details>
                                </a>
                            </x-td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="text-red-600 text-center text-2xl py-40 items-center">
            <i class="fa fa-exclamation-circle"></i> pas de resultat a l'etat de 
            <p class="font-bold">{{ request('etat') }}</p>
            </div>
        @endif
    </div>
</x-app-layout>