<div class="modal fade " data-bs-theme="dark" id="CreateModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="CreateModelLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-light" id="CreateModelLabel">Dynamite</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form action="#" method="post">
                        @csrf
                        <div class="md-5">
                            <label for="username" class="form-label text-light">Username</label>
                            <input type="text" name="username" id="username" class="form-control"
                                placeholder="Enter Username:" >
                        </div>
                        <div class="md-5">
                            <label for="email" class="form-label text-light">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="Enter Email:" >
                        </div>
                        <div class="md-5">
                            <input type="checkbox" name="actev" id="actev" class="form-check-input">
                            <label for="actev" class="form-check-label  text-light">actev</label>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-success">Save</button>

            </div>
        </div>
    </div>
</div>
