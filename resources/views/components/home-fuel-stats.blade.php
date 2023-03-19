@props(['name', 'max', 'min', 'average'])

<li class="mb-1">
    <div class="ms-2 me-auto">
        <h2 class="fw-bold">Τιμή {{ $name }}</h2>
        Μέγιστη <span>{{ $max }}</span> / Ελάχιστη <span>{{ $min }}</span> / Μέση <span>{{ $average }}</span>
    </div>
</li>
