@props(['date', 'title', 'elementId'])

<li class="mb-1">
    <div class="ms-2 me-auto">
        <h3>{{ date('d/m/Y', strtotime($date)) }}</h3>
        <a href="{{ route('announcements') . '#announcement-' . $elementId }}" class="a__item">
            <h2 class="fw-bold">{{ $title }}</h2>
        </a>
    </div>
</li>
