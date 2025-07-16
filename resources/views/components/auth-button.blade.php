<button type="submit" {{ $attributes->merge(['class' => 'flex w-full justify-center rounded-md px-3 py-1.5 text-sm/6 font-semibold shadow-xs focus-visible:outline-2 focus-visible:outline-offset-2']) }}>
    {{ $slot }}
</button>