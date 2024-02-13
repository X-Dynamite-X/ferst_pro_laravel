<div class="AddModelsubjectUser">

    @foreach ($subjects as $subject)
        <div class="modal fade " id="AddModelsubjectUser{{ $subject->id }}" data-bs-backdrop="static"
            data-bs-keyboard="false" tabindex="-1" aria-labelledby="AddModelsubjectUserLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 " id="AddModelsubjectUserLabel">Add User in subject </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <form action="#" method="post">
                                @csrf
                                <div class="md-5">
                                    <label for="username" class="form-label ">username</label>
                                    <select multiple class="form-control" id="multiSelect" name="multiOptions[]">
                                        @foreach ($users as $user)
                                            <option value="option1">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
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
    @endforeach
</div>
