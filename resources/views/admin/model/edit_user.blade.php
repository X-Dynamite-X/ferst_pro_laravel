<div class="EditModel">
    @foreach ($users as $user )

<div class="modal fade "  id="EditModel{{$user->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="EditModelLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="EditModelLabel">{{$user->name}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form action="#" method="post">
                        @csrf
                        @method('put')
                        <div class="md-5">
                            <label for="username" class="form-label ">Username</label>
                            <input type="text" name="username" id="username" class="form-control"
                                placeholder="Enter Username:" value="{{$user->name}}">
                        </div>
                        <div class="md-5">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="Enter Email:" value="{{$user->email}}">
                        </div>
                        <div class="md-5">
                            <input type="checkbox" name="actev" id="actev" class="form-check-input"
                                checked>
                            <label for="actev" class="form-check-label">actev</label>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModelShow{{$user->id}}">Show
                    <button class="btn btn-success">Save</button>

            </button>
            </div>
        </div>
    </div>
</div>
@endforeach
</div>
