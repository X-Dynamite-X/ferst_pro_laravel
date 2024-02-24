<div class="EditModelsubjectUser">
    @foreach ($subjects as $subject)
        @foreach ($subject->users as $user)
            <div class="modal fade " id="EditModelsubjectUser{{ $subject->id }}{{ $user->id }}"
                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="EditModelsubjectUser"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 text-light" id="EditModelsubjectUser">{{ $subject->subject }}
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <form id="form_edit_subject_user{{ $subject->id}}{{ $user->id}}"
                                    action="{{ route('update_user_mark', ['subject_id' => $subject->id, 'user_id' => $user->id]) }}"
                                    method="post">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="subject_id" value="{{ $subject->id }}"
                                        id="hidd_subject_id{{ $subject->id }}">
                                    <input type="hidden" name="user_id" value="{{ $user->id }}"
                                        id="hidd_user_id{{ $user->id }}">
                                    <div class="md-5">
                                        <label class="form-label d-inline">subject</label>
                                        <h5 class="d-inline">{{ $subject->subject }}</h5>
                                    </div>
                                    <div class="md-5">
                                        <label class="form-label d-inline">Username</label>
                                        <h5 class="d-inline">{{ $user->name }}</h5>
                                    </div>
                                    <div class="md-5">
                                        <label for="Mark{{ $user->id }}" class="form-label d-inline ">Mark</label>
                                        <input type="text" name="user_mark" maxlength="3"
                                            id="Mark{{ $user->id }}" class="w-auto  form-control d-inline"
                                            placeholder="Enter Mark:" value="{{ $user->pivot->user_mark }}">
                                    </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" data-user_id="{{ $user->id }}"data-subject_id="{{ $subject->id }}" class="btn btn-success btn_edit_subject_user">Save</button>
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    @endforeach
</div>
