<x-app-layout>
    <x-slot:header>clients</x-slot:header>

    <div class="flex justify-between my-7">
        <x-button class="bg-green-600">
            <a href="{{ route('clients.create') }}"> + ajouter un client</a>
        </x-button>
    </div>

    @if(session()->has('success'))
        <div class="my-2 px-4 py-2 text-green-800 bg-green-200 border border-green-400 rounded">
            {{ session('success') }}
        </div>
    @endif

        <table class="min-w-full border border-gray-300 bg-white text-center rounded-md my-3">
            <thead class='text-center'>
                <tr class="bg-gray-300">
                    <x-th>nom_complet</x-th>								
                    <x-th>sexe</x-th>
                    <x-th>date_naissnace</x-th>
                    <x-th>age</x-th>
                    <x-th>pays</x-th>
                    <x-th>ville</x-th>
                    <x-th>adresse</x-th>
                    <x-th>email</x-th>
                    <x-th>telephone</x-th>
                    <x-th>actions</x-th>
                </tr>
            </thead>
            <tbody>
                {{-- @dd($chambres) --}}
                @foreach ($clients as $client)
                    <tr class="bg-gray-200 border-gray-400 border-2">
                        <x-td>{{ $client->nom_complet }}</x-td>
                        <x-td>{{ $client->sexe }}</x-td>
                        <x-td>{{ $client->date_naissance }}</x-td>
                        <x-td>{{ $client->age }}</x-td>
                        <x-td>{{ $client->pays }}</x-td>
                        <x-td>{{ $client->ville }}</x-td>
                        <x-td>{{ $client->adresse }}</x-td>
                        <x-td>{{ $client->email }}</x-td>
                        <x-td>{{ $client->telephone }}</x-td>
                        <x-td class="w-20">
                            <a href="{{ route('clients.edit', $client->id)}} ">
                                <x-button-edit>
                                    update
                                </x-button-edit>
                            </a>
                            <form action="{{ route('clients.destroy', $client->id) }}" class="my-3" method="post">
                                @csrf
                                @method("DELETE")
                                <x-button-delete>
                                     delete
                                </x-button-delete>
                            </form>
                            <a href="{{ route('clients.show', $client->id)}} ">
                                <x-button-details>
                                    details
                                </x-button-detai>
                            </a>
                        </x-td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    
    {{ $clients->links() }}

</x-app-layout>