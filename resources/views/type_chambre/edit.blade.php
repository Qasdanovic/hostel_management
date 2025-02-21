<x-app-layout>

    <div class="flex justify-between my-7">
        <h1 class="text-white text-3xl">modifier un type :</h1>
        <x-button class="bg-red-600">
            <a href="{{ route('types.index') }}"> annuler la modification</a>
        </x-button>
    </div>

    <form action="{{ route('types.update', $type->id) }}" method="post">
        @csrf
        @method('PATCH')
        <div class="flex space-x-4 gap-4">
            <div class="mt-4 flex-1">
                <label for="type" class="text-white">type chambre :</label>
                <x-text-input id="type" class="block mt-1 w-full" type="text" name="type_chambre" :value="old('type_chambre')" value="{{ $type->type_chambre }}" />
                <x-input-error :messages="$errors->get('type_chambre')" class="mt-2" />
            </div>
            <div class="mt-4 flex-1">
                <label for="description" class="text-white">description :</label>
                <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" value="{{ $type->description }}" />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
        </div>
        <x-button class="bg-blue-600 text-white my-3" type='submit'>update type</x-button>
    </form>

    
</x-app-layout>