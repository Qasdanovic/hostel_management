<x-app-layout>
    <x-slot:header>type chambre</x-slot:header>

    <div class="flex justify-between">
        <h1 class="text-bold text-2xl text-white">{{ $type->type_chambre }} :</h1>
        <a class="text-white bg-red-600 px-6 py-2 rounded my-2" href="{{route("types.index")}}">retour</a>
    </div>
    <table class="min-w-full border border-gray-300 bg-white text-center rounded-md">
        
       
    </table>
</x-app-layout>