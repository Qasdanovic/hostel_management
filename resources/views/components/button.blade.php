<button
 {{ $attributes->merge(
    ["class" => "px-3 py-2 rounded-md text-white"]
    )}}">
    {{ $slot }}
</button>