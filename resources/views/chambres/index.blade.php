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
        <table class="min-w-full border border-gray-300 bg-white text-center rounded-md my-3">
            <thead class='text-center'>
                <tr class="bg-gray-300">
                    <x-th>id</x-th>
                    <x-th>numero de chambre</x-th>
                    <x-th>type</x-th>
                    <x-th>prix de nuit</x-th>
                    <x-th>prix de passage</x-th>
                    <x-th>capacite</x-th>
                    <x-th>nombre de lits</x-th>
                    <x-th>etage</x-th>
                    <x-th>nombre adultes et enfantes</x-th>
                    <x-th>image</x-th>
                    <x-th>actions</x-th>
                </tr>
            </thead>
            <tbody>
                {{-- @dd($chambres) --}}
                @foreach ($chambres as $ch)
                    <tr class="bg-gray-200 border-gray-400 border-2">
                        <x-td>{{ $ch->id }}</x-td>
                        <x-td>{{ $ch->numero_chambre }}</x-td>
                        <x-td>{{ $ch->type->type_chambre }}</x-td>
                        <x-td>{{ $ch->tarif->prix_base_nuit }}</x-td>
                        <x-td>{{ $ch->tarif->prix_base_passage }}</x-td>
                        <x-td>{{ $ch->capacite->titre_capacite }}</x-td>
                        <x-td>{{ $ch->capacite->nbr_lits_chambre }}</x-td>
                        <x-td>{{ $ch->etage_chambre }}</x-td>
                        <x-td>{{ $ch->capacite->nombre_adultes_enfants_chambre }}</x-td>
                        <x-td>
                            <img src="{{ asset('storage/'.$ch->image_chambre) }}" alt="{{ $ch->image_chambre }}">
                        </x-td>
                        <x-td class="flex flex-wrap gap-2 justify-center">
                            <a href="{{ route('chambres.edit', $ch->id)}} ">
                                    <x-button-edit>
                                        modifier
                                    </x-button-edit>
                                </a>
                            <form action="{{ route('chambres.destroy', $ch->id) }}" method="post">
                                @csrf
                                @method("DELETE")
                                <x-button-delete>
                                    supprimer
                                </x-button-delete>
                            </form>
                            <a href="{{ route('chambres.show', $ch->id)}} ">
                                    <x-button-details>
                                        details
                                    </x-button-details>
                                </a>
                        </x-td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $chambres->links() }}
    </div> 
</x-app-layout>
