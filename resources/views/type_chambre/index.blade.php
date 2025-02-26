<x-app-layout>
    <x-slot:header>chambre types</x-slot:header>

    <div class="flex justify-between my-7">
        <h1 class="text-white text-3xl">types des chambres :</h1>
        <x-button class="bg-green-600">
            <a href="{{ route('types.create') }}"> + add new type</a>
        </x-button>
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
                <x-th>type_chambre</x-th>
                <x-th>description</x-th>
                <x-th>actions</x-th>
            </tr>
        </thead>
        <tbody>
            @foreach ($types as $type)
                <tr class="bg-gray-200">
                    <x-td>{{ $type->id }}</x-td>
                    <x-td>{{ $type->type_chambre }}</x-td>
                    <x-td>{{ $type->description }}</x-td>
                    <x-td class="flex gap-4 text-center">
                        <a href="{{route('types.edit', $type->id)}}">
                            <x-button class="bg-blue-600" type="submit">
                                update
                            </x-button>
                        </a>
                        <form action="{{ route('types.destroy', $type->id) }}" method="post">
                            @csrf
                            @method("DELETE")
                            <x-button class="bg-red-600" onclick="return confirm('are you sure')">
                                delete
                            </x-button>
                        </form>
                        <a href="{{route('types.show', $type->id)}}">
                            <x-button class="bg-green-600">
                                details
                            </x-button>
                        </a>
                    </x-td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>