@props(['href', 'active'])

<a href="{{ $href }}"
   class="px-4 py-2 block text-sm transition-colors duration-200
   {{ $active ? 'text-green-600 font-semibold bg-green-50' : 'hover:bg-green-50 hover:text-green-700' }}">
   {{ $slot }}
</a>
