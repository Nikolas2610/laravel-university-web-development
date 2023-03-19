@extends('layouts.app')

@section('title', 'Ανακοινώσεις')

@section('content')
    @if(isset($message))
        {{$message}}
    @endif
    <div class="container mt-5">
        <!-- Title -->
        <div class="row mt-5">
            <div class="col-6">
                <h1>
                    <strong>Ανακοινώσεις</strong>
                </h1>
            </div>
            @if(isset($admin) && $admin)
                <div class="col-6 text-end">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-plus-lg mb-1" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                  d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                        </svg>
                        Καταχώρηση Νέας Ανακοίνωσης
                    </button>
                </div>
            @endif
        </div>
    </div>

    <div class="container p-5">
        <div class="p-3 border border-3 border-secondary rounded announcements">
            @if(count($announcements) === 0)
                <div class="col text-center">Δεν υπάρχει κάποια ανακοίνωση καραχωρημένη</div>
            @endif
            <ul>
                @foreach($announcements as $item)
                    <x-announcement-item id="{{$item->id}}" title="{{$item->title}}" content="{{$item->content}}"
                                         date="{{$item->created_at}}" admin="{{$admin}}"/>
                @endforeach
            </ul>
        </div>
    </div>


    <!-- Modal -->
    <x-modal-import-announcement/>

    <!-- Modal Confirm Delete -->
    <x-modal-delete-announcement/>

    <!-- Scripts -->
    <script>
        function openModal() {
            document.getElementById('exampleModal').classList.add('show');
            document.getElementById('exampleModal').style.display = 'block';
            document.getElementById('exampleModal').style.background = '#2228';
        }

        function closeModal() {
            document.getElementById('exampleModal').classList.remove('show');
            document.getElementById('exampleModal').style.display = 'none';
        }

        // Show the modal if there are validation errors
        @if ($errors->any())
        openModal()
        const buttons = document.getElementsByClassName('closeButton');

        for (let i = 0; i < buttons.length; i++) {
            buttons[i].addEventListener('click', (event) => {
                event.preventDefault();
                closeModal()
            });
        }
        @endif

        @if(isset($admin) && $admin)
        // Get the modal element
        const confirmDeleteModal = document.getElementById('confirmDeleteModal');

        // Attach an event listener to the modal show event
        confirmDeleteModal.addEventListener('show.bs.modal', function (event) {
            // Get the button that triggered the modal
            const button = event.relatedTarget;

            // Extract the announcement id from the data-announcement-id attribute
            const announcementId = button.getAttribute('data-announcement-id');

            // Set the announcement id value in the hidden input field
            const inputField = document.getElementById('announcement_id');
            inputField.value = announcementId;
            console.log(document.getElementById('deleteAnnouncementForm'))
        });
        @endif


    </script>
@endsection


