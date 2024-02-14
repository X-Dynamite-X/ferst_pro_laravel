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
                        <div class="row">
                            <p class="col-2 ">ID:</p>
                            <h5 class='col-2'>{{ $user->id }}</h5>
                        </div>
                        <div class="row">
                            <p class="col-2 ">Username:</p>
                            <h5 class='col-2'>{{ $user->name }}</h5>
                        </div>
                        <div class="row">
                            <p class="col-2 ">Email:</p>
                            <h5 class='col-2'>{{ $user->email }}</h5>
                        </div>
                        <div class="row">
                            <p class="col-2 ">acteve:</p>
                            <h5 class='col-2'>True</h5>
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
