<x-app-layout>
    <x-slot:header>chambres</x-slot:header>

    <div class="flex justify-between">
        <h1 class="text-bold text-2xl text-white">chambre with id {{ $chambre->chambre_id }} information :</h1>
        <a class="text-white bg-red-600 px-6 py-2 rounded my-2" href="{{route("chambres.index")}}">retour</a>
    </div>
    <table class="min-w-full border border-gray-300 bg-white text-center rounded-md">
        
        @foreach ($chambre as $key => $value)
            <tr>
                @if ($key === "image_chambre")
                    <x-th>{{ $key }}</x-th>
                    <x-td>
                        <img src="{{ asset('storage/'.$value) }}" alt="">
                    </x-td>
                @else
                <x-th>{{ $key }}</x-th>
                <x-td>{{ $value }}</x-td>
                @endif
            </tr>
        @endforeach
    </table>
</x-app-layout>