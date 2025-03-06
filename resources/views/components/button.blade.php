<button
 {{ $attributes->merge(
    ["class" => "px-3 h-[45px] rounded-md text-white bg-blue-600"]
    )}}">
    {{ $slot }}
</button>