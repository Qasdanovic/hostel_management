<x-app-layout>
    <x-slot:header>chambre tarifs</x-slot:header>

    <div class="flex justify-between my-7">
        <h1 class="text-white text-3xl">modifier un tarif :</h1>
        <x-button class="bg-red-600">
            <a href="{{ route('tarifs.index') }}"> annuler la modification :</a>
        </x-button>
    </div>


    <form action="{{ route('tarifs.update', $tarif->id) }}" method="post">
        @csrf
        @method("PATCH")
        <div class="px-40">
            <div class="mt-4 flex-1">
                <label for="numero" class="text-white">prix base passage : </label>
                <x-text-input id="numero" class="block mt-1 w-full" type="number" name="prix_base_nuit" value="{{ $tarif->prix_base_nuit }}" />
                <x-input-error :messages="$errors->get('prix_base_nuit')" class="mt-2" />
            </div>
            <div class="mt-4 flex-1">
                <label for="titre" class="text-white">prix base nuit :</label>
                <x-text-input  class="block mt-1 w-full" type="number" name="prix_base_passage" value="{{ $tarif->prix_base_passage }}" />
                <x-input-error :messages="$errors->get('prix_base_passage')" class="mt-2" />
            </div>

            <div class="mt-4 flex-1">
                <label for="titre" class="text-white">n prix nuit :</label>
                <x-text-input id="titre" class="block mt-1 w-full" type="number" name="n_prix_nuit" value="{{ $tarif->n_prix_nuit }}" />
                <x-input-error :messages="$errors->get('n_prix_nuit')" class="mt-2" />
            </div>
            <div class="mt-4 flex-1">
                <label for="numero" class="text-white">n prix passage : </label>
                <x-text-input id="numero" class="block mt-1 w-full" type="number" name="n_prix_passage" value="{{ $tarif->n_prix_passage }}" />
                <x-input-error :messages="$errors->get('n_prix_passage')" class="mt-2" />
            </div>
        </div>
        <x-button class="bg-blue-600 text-white my-3" type='submit'>modifier tarif</x-button>
    </form>

    
</x-app-layout>