<x-app-layout>
    <x-slot:header>chambre tarifs</x-slot:header>

    <div class="flex justify-between my-7">
        <h1 class="text-white text-3xl">tarifs des chambres :</h1>
        <x-button class="bg-green-600">
            <a href="{{ route('tarifs.create') }}"> + add new tarif</a>
        </x-button>
    </div>

    @if(session()->has('success'))
        <div class="my-2 px-4 py-2 text-green-800 bg-green-200 border border-green-400 rounded">
            {{ session('success') }}
        </div>
    @endif
    <table class="min-w-full border border-gray-300 bg-white text-center">
        <thead class='text-center'>
            <tr class="bg-gray-300">
                <x-th>id</x-th>
                <x-th>prix base nuit</x-th>
                <x-th>prix base passage</x-th>
                <x-th>n prix passage</x-th>
                <x-th>n prix passage</x-th>
                <x-th>actions</x-th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tarifs as $tarif)
                <tr class="bg-gray-200">
                    <x-td>{{ $tarif->id }}</x-td>
                    <x-td>{{ $tarif->prix_base_nuit }}</x-td>
                    <x-td>{{ $tarif->prix_base_passage }}</x-td>
                    <x-td>{{ $tarif->n_prix_nuit }}</x-td>
                    <x-td>{{ $tarif->n_prix_passage }}</x-td>
                    <x-td class="flex gap-4 text-center">
                        <x-button class="bg-blue-600" type="submit">
                            <a href="{{route('tarifs.edit', $tarif->id)}}">update</a>
                        </x-button>
                        <form action="{{ route('tarifs.destroy', $tarif->id) }}" method="post">
                            @csrf
                            @method("DELETE")
                            <x-button class="bg-red-600" onclick="return confirm('are you sure')">
                                delete
                            </x-button>
                        </form>
                    </x-td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>