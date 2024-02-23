<div class="EditModel">
    @foreach ($users as $user)
        <div class="modal fade " id="EditModel{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="EditModelLabel{{$user->id}}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="EditModelLabel{{$user->id}}">{{ $user->name }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <form id="form_edit_user{{ $user->id }}"
                                action="{{ route('edit_user', ['id' => $user->id]) }}" method="post">
                                @csrf
                                @method('put')
                                <div class="md-5">
                                    <label for="e_name{{$user->id}}" class="form-label ">Username</label>
                                    <input type="text" name="e_name" id="e_name{{$user->id}}" class="form-control"
                                        placeholder="Enter Username:" value="{{ $user->name }}">
                                </div>
                                <div class="md-5">
                                    <label for="e_email{{$user->id}}" class="form-label">Email</label>
                                    <input type="email" name="e_email" id="e_email{{$user->id}}" class="form-control"
                                        placeholder="Enter Email:" value="{{ $user->email }}">
                                </div>
                                <div class="md-5">
                                    <input type="checkbox" name="e_is_actev" id="e_is_actev{{$user->id}}" class="form-check-input"
                                        data-id="{{ $user->id }}" {{ $user->is_actev ? 'checked' : '' }}>
                                    <label for="e_is_actev{{$user->id}}" class="form-check-label">actev</label>
                                </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#ModelShow{{ $user->id }}">Show</button>
                        <button type="button" data-id="{{ $user->id }}"
                            class="btn btn-success btn_update_user">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
