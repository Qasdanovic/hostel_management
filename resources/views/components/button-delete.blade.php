<x-button class="bg-red-600 hover:bg-red-700 justify-center flex  w-[120px] text-center items-center gap-3" onclick="return confirm('are you sure')">
    <i class="fa-solid fa-trash"></i>
      {{ $slot }}
</x-button>