<x-button 
    {{ $attributes->merge([
        'class' => 'bg-blue-600 flex items-center justify-center hover:bg-blue-700 fit-content text-center gap-3'
    ]) }}>
    <i class="fa-solid fa-pencil"></i>
    {{ $slot }}
</x-button>
