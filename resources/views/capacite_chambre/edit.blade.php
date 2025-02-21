<x-app-layout>

    <div class="flex justify-between my-7">
        <h1 class="text-white text-3xl">modifier un capacite :</h1>
        <x-button class="bg-red-600">
            <a href="{{ route('capacite.index') }}"> annuler la modification :</a>
        </x-button>
    </div>


    <form action="{{ route('capacite.update', $capacite->id) }}" method="post">
        @csrf
        @method("PATCH")
        <div class="flex space-x-4 gap-4">
            <div class="mt-4 flex-1">
                <label for="titre" class="text-white">title chambre :</label>
                <x-text-input id="titre" class="block mt-1 w-full" type="text" name="titre_capacite" value="{{ $capacite->titre_capacite }}" />
                <x-input-error :messages="$errors->get('titre_capacite')" class="mt-2" />
            </div>
            <div class="mt-4 flex-1">
                <label for="numero" class="text-white">numero capacite : </label>
                <x-text-input id="numero" class="block mt-1 w-full" type="number" name="numero_capacite" value="{{ $capacite->numero_capacite }}" />
                <x-input-error :messages="$errors->get('numero_capacite')" class="mt-2" />
            </div>
        </div>
        <x-button class="bg-blue-600 text-white my-3" type='submit'>update capacite</x-button>
    </form>

    
</x-app-layout>