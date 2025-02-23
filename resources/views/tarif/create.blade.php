<x-app-layout>
    <x-slot:header>chambre tarifs</x-slot:header>

    <div class="flex justify-between my-7">
        <h1 class="text-white text-3xl">ajouter un tarif :</h1>
        <x-button class="bg-green-600">
            <a href="{{ route('tarifs.index') }}"> list des tarifs :</a>
        </x-button>
    </div>


    <form action="{{ route('tarifs.store') }}" method="post">
        @csrf
        <div class="px-40">
            <div class="mt-4 flex-1">
                <label for="numero" class="text-white">prix base passage : </label>
                <x-text-input id="numero" class="block mt-1 w-full" type="number" name="prix_base_nuit" :value="old('prix_base_nuit')" />
                <x-input-error :messages="$errors->get('prix_base_nuit')" class="mt-2" />
            </div>
            <div class="mt-4 flex-1">
                <label for="titre" class="text-white">prix base nuit :</label>
                <x-text-input  class="block mt-1 w-full" type="number" name="prix_base_passage" :value="old('prix_base_passage')" />
                <x-input-error :messages="$errors->get('prix_base_passage')" class="mt-2" />
            </div>

            <div class="mt-4 flex-1">
                <label for="titre" class="text-white">n prix nuit :</label>
                <x-text-input id="titre" class="block mt-1 w-full" type="number" name="n_prix_nuit" :value="old('n_prix_nuit')" />
                <x-input-error :messages="$errors->get('n_prix_nuit')" class="mt-2" />
            </div>
            <div class="mt-4 flex-1">
                <label for="numero" class="text-white">n prix passage : </label>
                <x-text-input id="numero" class="block mt-1 w-full" type="number" name="n_prix_passage" :value="old('n_prix_passage')" />
                <x-input-error :messages="$errors->get('n_prix_passage')" class="mt-2" />
            </div>
        </div>
        <x-button class="bg-blue-600 text-white my-3" type='submit'>ajouter tarif</x-button>
    </form>

    
</x-app-layout>