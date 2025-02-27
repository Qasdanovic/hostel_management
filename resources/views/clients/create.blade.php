<x-app-layout>
    <x-slot:header>clients</x-slot:header>

    <div class="flex justify-between my-7">
        <h1 class="text-white text-3xl">ajouter un client :</h1>
        <x-button class="bg-green-600">
            <a href="{{ route('clients.index') }}">liste des clients</a>
        </x-button>
    </div>

    <form action="{{ route('clients.store') }}" method="post">
        @csrf
        <div class="flex flex-wrap gap-4">
            <!-- Row 1: Two Inputs in a row -->
            <div class="mt-4 flex-1">
                <label for="nom_complet" class="text-white">nom complet :</label>
                <x-text-input id="nom_complet" class="block mt-1 w-full" type="text" name="nom_complet" :value="old('nom_complet')" />
                <x-input-error :messages="$errors->get('nom_complet')" class="mt-2" />
            </div>
            <div class="mt-4 flex-1">
                <label for="date_naissance" class="text-white">date de naissance :</label>
                <x-text-input id="date_naissance" class="block mt-1 w-full" type="date" name="date_naissance" :value="old('date_naissance')" />
                <x-input-error :messages="$errors->get('date_naissance')" class="mt-2" />
            </div>
        </div>
        <div class="flex flex-wrap gap-4">
            <div class="mt-4 flex-1">
                <label for="sexe" class="text-white">sexe :</label>
                <select id="sexe" name="sexe" class=" bg-gray-900 text-white block mt-1 w-full rounded">
                    <option value="">choisir un type</option>
                    <option value="homme">homme</option>
                    <option value="femme">femme</option>
                </select>
                <x-input-error :messages="$errors->get('sexe')" class="mt-2" />
            </div>
            <div class="mt-4 flex-1">
                <label for="age" class="text-white">age :</label>
                <x-text-input id="age" class="block mt-1 w-full" type="number" name="age" :value="old('age')" />
                <x-input-error :messages="$errors->get('age')" class="mt-2" />
            </div>
        </div>
        <div class="flex flex-wrap gap-4">
            <div class="mt-4 flex-1">
                <label for="pays" class="text-white">pays :</label>
                <select id="pays" name="pays" class=" bg-gray-900 text-white block mt-1 w-full rounded">
                    <option value="">choisir un pays :</option>
                    <option value="">Select a country</option>
                    <option value="Afghanistan">Afghanistan</option>
                    <option value="Albania">Albania</option>
                    <option value="Algeria">Algeria</option>
                    <option value="Andorra">Andorra</option>
                    <option value="Angola">Angola</option>
                    <option value="Argentina">Argentina</option>
                    <option value="Armenia">Armenia</option>
                    <option value="Australia">Australia</option>
                    <option value="Austria">Austria</option>
                    <option value="Azerbaijan">Azerbaijan</option>
                    <option value="Bahrain">Bahrain</option>
                    <option value="Bangladesh">Bangladesh</option>
                    <option value="Belgium">Belgium</option>
                    <option value="Brazil">Brazil</option>
                    <option value="Canada">Canada</option>
                    <option value="China">China</option>
                    <option value="Egypt">Egypt</option>
                    <option value="France">France</option>
                    <option value="Germany">Germany</option>
                    <option value="India">India</option>
                    <option value="Indonesia">Indonesia</option>
                    <option value="Italy">Italy</option>
                    <option value="Japan">Japan</option>
                    <option value="Mexico">Mexico</option>
                    <option value="Morocco">Morocco</option>
                    <option value="Netherlands">Netherlands</option>
                    <option value="Pakistan">Pakistan</option>
                    
                </select>
                <x-input-error :messages="$errors->get('pays')" class="mt-2" />
            </div>
            <div class="mt-4 flex-1">
                <label for="ville" class="text-white">ville :</label>
                <x-text-input id="ville" class="block mt-1 w-full" type="text" name="ville" :value="old('ville')" />
                <x-input-error :messages="$errors->get('ville')" class="mt-2" />
            </div>
        </div>
        <div class="flex flex-wrap gap-4">
            <!-- Row 1: Two Inputs in a row -->
            <div class="mt-4 flex-1">
                <label for="adresse" class="text-white">adresse :</label>
                <x-text-input id="adresse" class="block mt-1 w-full" type="text" name="adresse" :value="old('adresse')" />
                <x-input-error :messages="$errors->get('adresse')" class="mt-2" />
            </div>
            <div class="mt-4 flex-1">
                <label for="email" class="text-white">email :</label>
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
        </div>
        <div class="flex flex-wrap gap-4">
            <div class="mt-4 flex-1">
                <label for="telephone" class="text-white">telephone :</label>
                <x-text-input id="telephone" class="block mt-1 w-[49%]" type="text" name="telephone" :value="old('telephone')" />
                <x-input-error :messages="$errors->get('telephone')" class="mt-2" />
            </div>
        </div>
        <x-button type="submit" class="my-3 bg-blue-600">ajouter client</x-button>
    </form>
</x-app-layout>