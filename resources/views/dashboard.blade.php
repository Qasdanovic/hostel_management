<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="text-center text-white font-bold text-2xl">welcome back Mr. {{ Auth::user()->name }}</div>

    <div class="py-12 gap-4 flex">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 w-full text-center">
            <div class="bg-white dark:bg-red-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 space-y-2">
                    <a href="{{ route('types.index') }}" class="text-xl font-bold">types</a>
                    <hr>
                    <p class="font-bold">{{ $types }}</p>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8  w-full text-center">
            <div class="bg-white dark:bg-green-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 space-y-2">
                    <a href="{{ route('capacite.index') }}" class="text-xl font-bold">capacite</a>
                    <hr>
                    <p class="font-bold">{{ $capacites }}</p>
                </div>
            </div>
        </div>
    </div>
   
</x-app-layout>
