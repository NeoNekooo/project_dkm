@props(['route', 'icon', 'label'])

@php
    $isActive = str_starts_with(request()->route()->getName(), $route);
@endphp

<a href="{{ route($route) }}"
   class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-white/10 transition-colors duration-200 {{ $isActive ? 'active-nav' : '' }}">
    <i class="{{ $icon }} w-5"></i>
<span>{{ $label }}</span>
</a>
