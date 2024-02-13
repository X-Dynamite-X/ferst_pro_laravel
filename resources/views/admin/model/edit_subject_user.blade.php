<div class="EditModelsubjectUser">
    <div class="modal fade " data-bs-theme="dark" id="EditModelsubjectUser" data-bs-backdrop="static"
        data-bs-keyboard="false" tabindex="-1" aria-labelledby="EditModelsubjectUser" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-light" id="EditModelsubjectUser">c++</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form action="#" method="post">
                            @csrf
                            @method('put')
                            <div class="md-5">
                                <label for="subject" class="form-label text-light">subject</label>
                                <input type="text" name="subject" id="subject" class="form-control"
                                    placeholder="Enter subject:" value="c++" disabled>
                            </div>
                            <div class="md-5">
                                <label for="username" class="form-label text-light">Username</label>
                                <input type="text" name="username" id="username" class="form-control"
                                    placeholder="Enter Username:" value="dynamite">
                            </div>
                            <div class="md-5">
                                <label for="Mark" class="form-label text-light">Mark</label>
                                <input type="number" name="Mark" id="Mark" class="form-control"
                                    placeholder="Enter Mark:" value="50">
                            </div>

                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-success">Save</button>

                    </button>
                </div>
            </div>
        </div>
    </div>


</div>
