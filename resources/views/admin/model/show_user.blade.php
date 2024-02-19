<div id="show_user">
    @foreach ($users as $user)
        <div class="modal fade " id="ModelShow{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="ModelShowLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="ModelShowLabel">{{ $user->name }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="md-5">
                            <p class="d-inline ">ID:</p>
                            <h5 class='d-inline'>{{ $user->id }}</h5>
                        </div>
                        <div class="md-5">
                            <p class="d-inline ">Username:</p>
                            <h5 class='d-inline'>{{ $user->name }}</h5>
                        </div>
                        <div class="md-5">
                            <p class="d-inline ">Email:</p>
                            <h5 class='d-inline'>{{ $user->email }}</h5>
                        </div>
                        <div class="md-5">
                            <p class="d-inline ">acteve:</p>
                            @if ($user->is_actev == 1)
                                <h5 scope="row" class="d-inline  text-success "> Is Actev </h5>
                            @else
                                <h5 scope="row" class="d-inline  text-danger"> Not Actev </h5>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                            data-bs-target="#EditModel{{ $user->id }}"> Edit </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
