<x-app-layout>
    <x-slot:header>chambre types</x-slot:header>

    <div class="flex justify-between my-7">
        <h1 class="text-white text-3xl">ajouter un type :</h1>
        <x-button class="bg-green-600">
            <a href="{{ route('types.index') }}"> list des types</a>
        </x-button>
    </div>


    <form action="{{ route('types.store') }}" method="post">
        @csrf
        <div class="flex space-x-4 gap-4">
            <div class="mt-4 flex-1">
                <label for="type" class="text-white">type chambre :</label>
                <x-text-input id="type" class="block mt-1 w-full" type="text" name="type_chambre" :value="old('type_chambre')" />
                <x-input-error :messages="$errors->get('type_chambre')" class="mt-2" />
            </div>
            <div class="mt-4 flex-1">
                <label for="description" class="text-white">description :</label>
                <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
        </div>
        <x-button class="bg-blue-600 text-white my-3" type='submit'>add type</x-button>
    </form>

    
</x-app-layout>