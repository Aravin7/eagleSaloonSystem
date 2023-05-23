<!-- Modal -->
    <!-- Button trigger modal -->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">SET ACTION</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" name="adminaction">
                    <div class="modal-body">
                        <select class="custom-select" name="status" required="">
                            <option value="">Choose...</option>
                            <option value="1">Approve</option>
                            <option value="2">Decline</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" name="update">Apply</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- End Modal -->