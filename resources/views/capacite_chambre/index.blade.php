<x-app-layout>

    <div class="flex justify-between my-7">
        <h1 class="text-white text-3xl">capacite des chambres :</h1>
        <x-button class="bg-green-600">
            <a href="{{ route('capacite.create') }}"> + add new capacite</a>
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
                <x-th>titre capacite</x-th>
                <x-th>numero capacite</x-th>
                <x-th>actions</x-th>
            </tr>
        </thead>
        <tbody>
            @foreach ($capacites as $cap)
                <tr class="bg-gray-200">
                    <x-td>{{ $cap->id }}</x-td>
                    <x-td>{{ $cap->titre_capacite }}</x-td>
                    <x-td>{{ $cap->numero_capacite }}</x-td>
                    <x-td class="flex gap-4 text-center">
                        <x-button class="bg-blue-600" type="submit">
                            <a href="{{route('capacite.edit', $cap->id)}}">update</a>
                        </x-button>
                        <form action="{{ route('capacite.destroy', $cap->id) }}" method="post">
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