<x-app-layout>
    <x-slot:header>chambres</x-slot:header>

    <div class="flex justify-between my-7">
        <h1 class="text-white text-3xl">ajouter une chambre :</h1>
        <x-button class="bg-green-600">
            <a href="{{ route('chambres.index') }}">liste des chambres</a>
        </x-button>
    </div>

    <form action="{{ route('chambres.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-wrap gap-4">
            <!-- Row 1: Two Inputs in a row -->
            <div class="mt-4 flex-1">
                <label for="numero_chambre" class="text-white">Numéro de chambre :</label>
                <x-text-input id="numero_chambre" class="block mt-1 w-full" type="text" name="numero_chambre" :value="old('numero_chambre')" />
                <x-input-error :messages="$errors->get('numero_chambre')" class="mt-2" />
            </div>
            <div class="mt-4 flex-1">
                <label for="type_chambre_id" class="text-white">Type :</label>
                <select id="type_chambre_id" name="type_chambre_id" class=" bg-gray-900 text-white block mt-1 w-full rounded">
                    <option value="">choisir un type</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->type_chambre }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('type_chambre_id')" class="mt-2" />
            </div>
        </div>

        <div class="flex flex-wrap gap-4">
            <!-- Row 2: Two Inputs in a row -->
            <div class="mt-4 flex-1">
                <label for="nbr_lits_chambre" class="text-white">Nombre de lits :</label>
                <x-text-input id="nbr_lits_chambre" class="block mt-1 w-full" type="number" name="nbr_lits_chambre" :value="old('nbr_lits_chambre')" />
                <x-input-error :messages="$errors->get('nbr_lits_chambre')" class="mt-2" />
            </div>
            <div class="mt-4 flex-1">
                <label for="etage_chambre" class="text-white">Étage :</label>
                <x-text-input id="etage_chambre" class="block mt-1 w-full" type="number" name="etage_chambre" :value="old('etage_chambre')" />
                <x-input-error :messages="$errors->get('etage_chambre')" class="mt-2" />
            </div>
        </div>

        <div class="flex flex-wrap gap-4">
            <!-- Row 3: Two Inputs in a row -->
            <div class="mt-4 flex-1">
                <label for="capacite_id" class="text-white">Capacité :</label>
                <select id="capacite_id" name="capacite_chambre_id" class=" bg-gray-900 text-white block mt-1 w-full rounded">
                    <option value="">choisir un capacite</option>
                    @foreach ($capacites as $capacite)
                        <option value="{{ $capacite->id }}">{{ $capacite->titre_capacite }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('capacite_chambre_id')" class="mt-2" />
            </div>
            <div class="mt-4 flex-1">
                <label for="tarif_chambre_id" class="text-white">Tarif :</label>
                <select id="tarif_chambre_id" name="tarif_chambre_id" class="block mt-1 w-full rounded bg-gray-900 text-white">
                    <option value="">choisir un tarif</option>
                    @foreach ($tarifs as $tarif)
                        <option value="{{ $tarif->id }}">prix base nuit : {{$tarif->prix_base_nuit}} - prix base passage : {{$tarif->prix_base_passage }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('tarif_chambre_id')" class="mt-2" />
            </div>
        </div>

        <div class="flex flex-wrap gap-4">
            <!-- Row 4: Two Inputs in a row -->
            <div class="mt-4 flex-1">
                <label for="nombre_adultes_enfants_chambre" class="text-white">Nombre adultes et enfants :</label>
                <x-text-input id="nombre_adultes_enfants_chambre" class="block mt-1 w-full" type="number" name="nombre_adultes_enfants_chambre" :value="old('nombre_adultes_enfants_chambre')" />
                <x-input-error :messages="$errors->get('nombre_adultes_enfants_chambre')" class="mt-2" />
            </div>
            <div class="mt-4 flex-1">
                <label for="renfort_chambre" class="text-white">Renfort :</label>
                <select id="renfort_chambre" class=" bg-gray-900 text-white mt-1 w-full rounded" name="renfort_chambre">
                    <option value="">renfort chambre :</option>
                    <option value="0">NON</option>
                    <option value="1">OUI</option>
                </select>
                <x-input-error :messages="$errors->get('renfort_chambre')" class="mt-2" />
            </div>
        </div>

        <div class="mt-4">
            <label for="image_chambre" class="text-white">Image :</label>
            <x-text-input id="image_chambre" class="block mt-1" type="file" name="image_chambre" />
            <x-input-error :messages="$errors->get('image_chambre')" class="mt-2" />
        </div>

        <x-button class="bg-blue-600 text-white my-5 m" type='submit'>Ajouter la chambre</x-button>
    </form>
</x-app-layout>
