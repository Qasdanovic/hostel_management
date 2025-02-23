<x-app-layout>
    <x-slot:header>chambre capacites</x-slot:header>

    <div class="flex justify-between my-7">
        <h1 class="text-white text-3xl">ajouter un capacite :</h1>
        <x-button class="bg-green-600">
            <a href="{{ route('capacite.index') }}"> list des capacites :</a>
        </x-button>
    </div>


    <form action="{{ route('capacite.store') }}" method="post">
        @csrf
        <div class="flex space-x-4 gap-4">
            <div class="mt-4 flex-1">
                <label for="titre" class="text-white">title chambre :</label>
                <x-text-input id="titre" class="block mt-1 w-full" type="text" name="titre_capacite" :value="old('titre_capacite')" />
                <x-input-error :messages="$errors->get('titre_capacite')" class="mt-2" />
            </div>
            <div class="mt-4 flex-1">
                <label for="numero" class="text-white">numero capacite : </label>
                <x-text-input id="numero" class="block mt-1 w-full" type="number" name="numero_capacite" :value="old('numero_capacite')" />
                <x-input-error :messages="$errors->get('numero_capacite')" class="mt-2" />
            </div>
        </div>
        <x-button class="bg-blue-600 text-white my-3" type='submit'>add capacite</x-button>
    </form>

    
</x-app-layout>