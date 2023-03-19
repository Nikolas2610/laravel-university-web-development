@props(['title', 'id', 'content', 'date', 'admin'])

<li class="px-5 mb-3" id="announcement-{{$id}}" class="announcement" id="{{$id}}">
    <div class="row">
        <div class="col-6">
            <h3>{{ date('d/m/Y', strtotime($date)) }}</h3>
        </div>
        @if($admin)
            <div class="col-6 text-end">
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-announcement-id="{{$id}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                         class="bi bi-trash-fill mb-1" viewBox="0 0 16 16">
                        <path
                            d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                    </svg>
                    Διαγραφή
                </button>
            </div>
        @endif
    </div>

    <div class="row mb-2">
        <div class="col">
            <h2>
                <strong>{{$title}}</strong>
            </h2>
        </div>
    </div>
    <div
        class="row border border-3 border-secondary rounded d-flex justify-content-center align-items-center p-5">
        {{ $content }}
    </div>
</li>

