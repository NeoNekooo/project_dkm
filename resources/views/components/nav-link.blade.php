@props(['href', 'active'])

<a href="{{ $href }}"
   {{ $attributes->merge(['class' => ($active ? 'text-green-600 font-semibold' : 'hover:text-green-600') . ' transition-colors duration-200']) }}>
   {{ $slot }}
</a>
