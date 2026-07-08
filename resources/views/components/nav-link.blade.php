@props(['active', 'icon'])

@php
$classes = ($active ?? false) ? 'nav-link active' : 'nav-link';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    <i class="bi {{ $icon }}"></i> {{ $slot }}
</a>