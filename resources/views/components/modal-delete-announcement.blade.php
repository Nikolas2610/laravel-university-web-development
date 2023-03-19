<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog"
     aria-labelledby="confirmDeleteModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Επιβεβαίωση διαγραφής</h5>
                <button type="button" class="btn-close closeButton" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Είστε βέβαιοι ότι θέλετε να διαγράψετε αυτή την ανακοίνωση;
            </div>
            <form id="deleteAnnouncementForm" method="POST" action="{{ route('announcements.destroy', 0) }}">
                @csrf
                @method('DELETE')
                <input type="hidden" name="announcement_id" id="announcement_id" value="">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ακύρωση</button>
                    <button type="submit" class="btn btn-danger">Διαγραφή</button>
                </div>
            </form>
        </div>
    </div>
</div>
