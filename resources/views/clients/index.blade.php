<x-app-layout>
    <x-slot:header>Clients</x-slot:header>

    <div class="flex justify-between my-7">
        <a href="{{ route('clients.create') }}" class="text-white">
            <x-button-edit class="w-[180px]">
                Ajouter un client
            </x-button-edit>
        </a>
    </div>

    <div class="border-blue-600 my-4 w-full p-4 bg-gray-800 rounded-md">
        <form action="{{ route('clients.index') }}" method="GET" class="flex space-x-4 w-full">
            <div class="w-full">
                <x-input-label for="nom_complet">Nom Complet :</x-input-label>
                <x-text-input id="nom_complet" name="nom_complet" class="w-full"></x-text-input>
            </div>
            <div class="w-full">
                <x-input-label for="pays">Pays :</x-input-label>
                <x-text-input id="pays" name="pays" class="w-full"></x-text-input>
            </div>
            <div class="w-full">
                <x-input-label for="ville">Ville :</x-input-label>
                <x-text-input id="ville" name="ville" class="w-full"></x-text-input>
            </div>
            <div class="flex items-end">
                <x-button class="bg-blue-600 hover:bg-blue-700">Search</x-button>
            </div>
            <div class="flex items-end">
                <a href="{{route('clients.index')}}">
                    <button class="bg-red-600 hover:bg-red-700 px-3 py-2 rounded-md text-white"
                        type="button">annuler</button>
                </a>
            </div>
        </form>
    </div>

    @if(session()->has('success'))
    <div class="my-2 px-4 py-2 text-green-800 bg-green-200 border border-green-400 rounded">
        {{ session('success') }}
    </div>
    @endif

    @if ($clients->count() > 0)

    <table class="min-w-full border border-gray-300 bg-white text-center rounded-md my-3">
        <thead class='text-center'>
            <tr class="bg-gray-300">
                <x-th>Nom Complet</x-th>
                <x-th>Pays</x-th>
                <x-th>Ville</x-th>
                <x-th>Téléphone</x-th>
                <x-th>Actions</x-th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
            <tr class="bg-gray-200 border-gray-400 border-2 hover:bg-gray-300">
                <x-td>{{ $client->nom_complet }}</x-td>
                <x-td>{{ $client->pays }}</x-td>
                <x-td>{{ $client->ville }}</x-td>
                <x-td>{{ $client->telephone }}</x-td>
                <x-td class="w-20">
                    <a href="{{ route('clients.edit', $client->id)}}">
                        <x-button-edit class="hover:bg-yellow-600">
                            Update
                        </x-button-edit>
                    </a>
                    <form action="{{ route('clients.destroy', $client->id) }}" class="my-3" method="post">
                        @csrf
                        @method("DELETE")
                        <x-button-delete class="hover:bg-red-600">
                            Delete
                        </x-button-delete>
                    </form>
                    <a href="{{ route('clients.show', $client->id)}}">
                        <x-button-details class="hover:bg-blue-600">
                            Details
                        </x-button-details>
                    </a>
                </x-td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @else
    <div class="font-bold text-white text-3xl text-center my-14"><i class="fa-solid fa-user-xmark"></i> pas de resultat
    </div>
    @endif

    <div class="my-4">
        {{ $clients->count() > 4 ? $clients->links() : '' }}
    </div>
</x-app-layout>