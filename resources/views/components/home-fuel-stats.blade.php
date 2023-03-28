@props(['name', 'max', 'min', 'average'])

<li class="mb-1">
    <div class="ms-2 me-auto">
        <h2 class="fw-bold">Τιμή {{ $name }}</h2>
        Μέγιστη <span>{{ $max }}</span> / Ελάχιστη <span>{{ $min }}</span> / Μέση <span>{{ number_format($average, 2) }}</span>
    </div>
</li>
