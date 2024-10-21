@props(['active' => false])

<a {{ $attributes }} style="color: {{ $active ? 'red' : '' }}">{{ $slot }}</a>
