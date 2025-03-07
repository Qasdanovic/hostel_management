<x-app-layout>
    <x-slot:header>chambres</x-slot:header>

    
    <div class="flex justify-between my-7">
        <a href="{{ route('chambres.create') }}" class="text-white">
            <x-button-edit class="w-[200px]">
                ajouter un chambre
            </x-button-edit>
        </a>
    </div>

    @if(session()->has('success'))
        <div class="my-2 px-4 py-2 text-green-800 bg-green-200 border border-green-400 rounded">
            {{ session('success') }}
        </div>
    @endif

    <!-- Make the table responsive -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-lg overflow-hidden shadow-lg my-5">
            <thead class='text-center'>
            <tr class="bg-gray-300 text-white">
            <x-th class="px-4 py-3">id</x-th>
            <x-th class="px-4 py-3">numero de chambre</x-th>
            <x-th class="px-4 py-3">type</x-th>
            <x-th class="px-4 py-3">prix de nuit</x-th>
            <x-th class="px-4 py-3">prix de passage</x-th>
            <x-th class="px-4 py-3">capacite</x-th>
            <x-th class="px-4 py-3">nombre de lits</x-th>
            <x-th class="px-4 py-3">etage</x-th>
            <x-th class="px-4 py-3">nombre adultes et enfantes</x-th>
            <x-th class="px-4 py-3">image</x-th>
            <x-th class="px-4 py-3">actions</x-th>
            </tr>
            </thead>
            <tbody>
            @foreach ($chambres as $ch)
            <tr class="hover:bg-gray-100 border-b border-gray-200 transition-all">
            <x-td class="px-4 py-3">{{ $ch->id }}</x-td>
            <x-td class="px-4 py-3">{{ $ch->numero_chambre }}</x-td>
            <x-td class="px-4 py-3">{{ $ch->type->type_chambre }}</x-td>
            <x-td class="px-4 py-3">{{ $ch->tarif->prix_base_nuit }}</x-td>
            <x-td class="px-4 py-3">{{ $ch->tarif->prix_base_passage }}</x-td>
            <x-td class="px-4 py-3">{{ $ch->capacite->titre_capacite }}</x-td>
            <x-td class="px-4 py-3">{{ $ch->capacite->nbr_lits_chambre }}</x-td>
            <x-td class="px-4 py-3">{{ $ch->etage_chambre }}</x-td>
            <x-td class="px-4 py-3">{{ $ch->capacite->nombre_adultes_enfants_chambre }}</x-td>
            <x-td class="px-4 py-3 w-[150px]">
                <img src="{{ asset('storage/'.$ch->image_chambre) }}" 
                 alt="{{ $ch->image_chambre }}"
                 class="w-full h-20 object-cover rounded">
            </x-td>
            <x-td class="px-4 py-3">
                <div class="flex items-center space-x-2">
                <a href="{{ route('chambres.edit', $ch->id)}}" title="Modifier">
                    <x-button-edit>
                    </x-button-edit>
                </a>
                <form action="{{ route('chambres.destroy', $ch->id) }}" method="post">
                    @csrf
                    @method("DELETE")
                    <x-button-delete>
                    </x-button-delete>
                </form>
                <a href="{{ route('chambres.show', $ch->id)}}" title="Details">
                    <x-button-details>
                    </x-button-details>
                </a>
                </div>
            </x-td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{ $chambres->links() }}
    </div> 
</x-app-layout>
