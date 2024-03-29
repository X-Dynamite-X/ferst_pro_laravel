<div class="modal fade " data-bs-theme="dark" id="CreatesubjectModel" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="CreatesubjectModelLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-light" id="CreatesubjectModelLabel">Create subject Model</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form action="{{ route('store_subject') }}" id="form_subject" method="post"  >
                        @csrf
                        <div class="md-5">
                            <label for="subject_input" class="form-label text-light">subject</label>
                            <input type="text" name="subject_input" id="subject_input" class="form-control"
                                placeholder="Enter subject:" r>
                        </div>
                        <div class="md-5">
                            <label for="mini_mark" class="form-label text-light">Minimum Mark for saccess</label>
                            <input type="text" name="mini_mark" id="mini_mark" class="form-control"   maxlength="3"
                                placeholder="Enter Minimum Mark for saccess: ">
                        </div>
                        <div class="md-5">
                            <label for="full_mark" class="form-label text-light">Full Mark</label>
                            <input type="text" name="full_mark" id="full_mark" class="form-control"   maxlength="3"
                                placeholder="Enter Full Mark:">
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" id="create_subject" >Save</button>
            </div>
            </form>
        </div>
    </div>
</div>



<script>
    var create_url = "{{ route('store_subject') }}";

</script>
