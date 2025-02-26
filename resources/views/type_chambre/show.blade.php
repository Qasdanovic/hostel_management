<x-app-layout>
    <x-slot:header>type chambre</x-slot:header>
    {{-- @dd($type) --}}

    <div class="flex justify-between">
        <h1 class="text-bold text-2xl text-white">{{ $type->type_chambre }} :</h1>
        <a class="text-white bg-red-600 px-6 py-2 rounded my-2" href="{{route("types.index")}}">retour</a>
    </div>
    <table class="min-w-full mb-4 border border-gray-300 bg-white text-center rounded-md">
        @foreach ($type->getAttributes() as $key => $value)
            <tr>
                <x-td>{{ $key }}</x-td>
                <x-td>{{ $value }}</x-td>
            </tr>
        @endforeach

        
    </table>
    <div class="text-white">
        chambres avec ce type :
        @foreach ($type->chambres as $item)
<<<<<<< HEAD
            <span class="text-bold">{{ $item->numero_chambre }} |</span>
=======
            <span class="text-bold">{{ $item->numero_chambre }}</span>
>>>>>>> c8cbc06 (7- create show page for each controller)
        @endforeach
    </div>
</x-app-layout>