<div id="show_user">
    @foreach ($users as $user)
        <div class="modal fade " id="ModelShow{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="ModelShowLabel{{ $user->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="ModelShowLabel{{ $user->id }}">{{ $user->name }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="md-5">
                            <p class="d-inline ">ID:</p>
                            <h5 class='d-inline' >{{ $user->id }}</h5>
                        </div>
                        <div class="md-5">
                            <p class="d-inline ">Username:</p>
                            <h5 class='d-inline' id="show_user_name{{$user->id}}">{{ $user->name }}</h5>
                        </div>
                        <div class="md-5">
                            <p class="d-inline ">Email:</p>
                            <h5 class='d-inline'  id="show_user_email{{$user->id}}">{{ $user->email }}</h5>
                        </div>
                        <div class="md-5">
                            <p class="d-inline " >acteve:</p>
                                <h5 scope="row"  id="show_user_is_actev{{$user->id}}" class="d-inline {{ $user->is_actev ? 'text-success i' : 'text-danger' }}">
                                    {{ $user->is_actev ? 'Is Actev' : 'Not Actev' }} </h5>
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
