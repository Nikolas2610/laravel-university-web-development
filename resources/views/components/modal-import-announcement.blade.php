<div class="modal fade show" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Καταχώρηση Νέας Ανακοίνωσης</h5>
                <button type="button" class="btn-close closeButton" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <form action="{{ route('announcementImport') }}" method="post" id="announcementImportForm"
                  onsubmit="return validationImportAnnouncement(event)">
                @csrf
                <div class="modal-body">
                    <x-form-floating-input label="Τίτλος:" id="title" type="text"></x-form-floating-input>
                    <x-form-floating-textarea label="Ανακοίνωση:" id="content"
                                              type="text"></x-form-floating-textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary closeButton" data-bs-dismiss="modal">Ακύρωση
                    </button>
                    <button type="submit" class="btn btn-primary">Καταχώρηση</button>
                </div>
            </form>
        </div>
    </div>
</div>
