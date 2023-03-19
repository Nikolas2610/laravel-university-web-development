@props(['route'])

<li>
    <a href="{{ route($route) }}" class="nav-link text-white {{ Route::current()->getName() === $route ? 'active' : '' }}">
        {{ $slot }}
    </a>
</li>
