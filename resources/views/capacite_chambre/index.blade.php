<x-app-layout>
    <x-slot:header>chambre capacites</x-slot:header>

    
    <div class="flex justify-between my-7">
        <a href="{{ route('capacite.create') }}" class="text-white">
            <x-button-edit class="w-[200px]">
                ajouter un capacite
            </x-button-edit>
        </a>
    </div>

    @if(session()->has('success'))
        <div class="my-2 px-4 py-2 text-green-800 bg-green-200 border border-green-400 rounded">
            {{ session('success') }}
        </div>
    @endif
    @if(session()->has('error'))
        <div class="my-2 px-4 py-2 text-red-800 bg-red-400 border border-red-500 rounded">
            {{ session('error') }}
        </div>
    @endif
    <table class="min-w-full border border-gray-300 bg-white text-center">
        <thead class='text-center'>
            <tr class="bg-gray-300">
                <x-th>id</x-th>
                <x-th>titre capacite</x-th>
                <x-th>numero capacite</x-th>
                <x-th>actions</x-th>
            </tr>
        </thead>
        <tbody>
            @foreach ($capacites as $cap)
                <tr class="bg-gray-200 border-gray-400 border-2">
                    <x-td>{{ $cap->id }}</x-td>
                    <x-td>{{ $cap->titre_capacite }}</x-td>
                    <x-td>{{ $cap->numero_capacite }}</x-td>
                    <x-td class="flex gap-4 text-center">
                        <a href="{{route('capacite.edit', $cap->id)}}">
                                <x-button-edit class="bg-blue-600" type="submit">
                                    modifier
                                </x-button-ed>
                            </a>
                        <form action="{{ route('capacite.destroy', $cap->id) }}" method="post">
                            @csrf
                            @method("DELETE")
                            <x-button-delete class="bg-red-600" onclick="return confirm('are you sure')">
                                supprimer
                            </x-button-delete>
                        </form>
                    </x-td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>