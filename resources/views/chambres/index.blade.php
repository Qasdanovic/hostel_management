<x-app-layout>
    <x-slot:header>chambres</x-slot:header>

    <div class="flex justify-between my-7">
        <h1 class="text-white text-3xl">chambres :</h1>
        <x-button class="bg-green-600">
            <a href="{{ route('chambres.create') }}"> + ajouter un chmabre</a>
        </x-button>
    </div>

    @if(session()->has('success'))
        <div class="my-2 px-4 py-2 text-green-800 bg-green-200 border border-green-400 rounded">
            {{ session('success') }}
        </div>
    @endif

    <!-- Make the table responsive -->
    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300 bg-white text-center">
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
                    <tr class="bg-gray-200">
                        <x-td>{{ $ch->chambre_id }}</x-td>
                        <x-td>{{ $ch->numero_chambre }}</x-td>
                        <x-td>{{ $ch->type_chambre }}</x-td>
                        <x-td>{{ $ch->prix_base_nuit }}</x-td>
                        <x-td>{{ $ch->prix_base_passage }}</x-td>
                        <x-td>{{ $ch->titre_capacite }}</x-td>
                        <x-td>{{ $ch->nbr_lits_chambre }}</x-td>
                        <x-td>{{ $ch->etage_chambre }}</x-td>
                        <x-td>{{ $ch->nombre_adultes_enfants_chambre }}</x-td>
                        <x-td>
                            <img src="{{ asset('storage/'.$ch->image_chambre) }}" alt="{{ $ch->image_chambre }}">
                        </x-td>
                        <x-td class="flex flex-wrap gap-2 justify-center">
                            <x-button class="bg-blue-600">
                                <a href="{{ route('chambres.edit', $ch->chambre_id)}} ">update</a>
                            </x-button>
                            <form action="{{ route('chambres.destroy', $ch->chambre_id) }}" method="post">
                                @csrf
                                @method("DELETE")
                                <x-button class="bg-red-600" onclick="return confirm('are you sure')">
                                    delete
                                </x-button>
                            </form>
                        </x-td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> 
</x-app-layout>
