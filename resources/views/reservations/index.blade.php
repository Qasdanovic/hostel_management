<x-app-layout>
    <x-slot:header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Reservations
        </h2>
    </x-slot:header>

    <div class="flex justify-between my-7">
        <a href="{{ route('reservations.create') }}" class="text-white">
            <x-button-edit class="w-[200px] bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Ajouter une réservation
            </x-button-edit>
        </a>
    </div>

    @if(session()->has('success'))
        <div class="my-2 px-4 py-2 text-green-800 bg-green-200 border border-green-400 rounded">
            {{ session('success') }}
        </div>
    @endif
    @if(session()->has('error'))
        <div class="my-2 px-4 py-2 text-red-800 bg-red-400 border border-red-500 rounded">
            {{ session('error') }}
        </div>
    @endif

    <div class="overflow-x-auto">
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
    </div>
</x-app-layout>