@props(['active', 'route', 'icon', 'title'])


<li class="nav-item">
    <a class="nav-link {{ $active ? 'active' : '' }}" href="{{ $route }}">
        <i class="material-icons">{{ $icon }}</i>
        <span>{{ $title }}</span>
    </a>
</li>
