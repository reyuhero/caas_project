<details class="bg-white rounded-4 shadow-sm {{ $attributes->get('class') }}">
    <summary class="py-2 px-3">
        <a href="{{ $href }}" class="text-decoration-none w-100 d-flex gap-3 text-black align-items-center">
            <i class="{{ $icon }} icon-fa"></i>
            <span class="text-capitalize">{{ $name }}</span>
        </a>
    </summary>
    <article class="flex-column">
        {{ $slot }}
    </article>
</details>
