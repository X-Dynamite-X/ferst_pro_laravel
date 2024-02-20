<div class="AddModelsubjectUser">
    @foreach ($subjects as $subject)
        <div class="modal fade " id="AddModelsubjectUser{{ $subject->id }}" data-bs-backdrop="static"
            data-bs-keyboard="false" tabindex="-1" aria-labelledby="AddModelsubjectUserLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 " id="AddModelsubjectUserLabel{{ $subject->id }}">Add User in
                            {{ $subject->subject }} subject </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body h">
                        <div class="container">
                            <form id="form_add_subject_user{{ $subject->id }}"
                                action="{{ route('add_user_for_subject', ['subject_id' => $subject->id]) }}"
                                method="post">
                                @csrf
                                <input type="hidden" name="subject_id" value="{{ $subject->id }}">
                                <div class="md-5">
                                    <select class="form-select form-select-sm mb-3" aria-label="Small select "
                                        id="user_ids" name="user_ids[]" multiple required>
                                        @foreach ($users as $user)
                                            @if (!$subject->users->contains($user))
                                                @if ($user->id !== $user_auth->id)
                                                    <option id="stud{{ $subject->id }}{{ $user->id }}"
                                                        name="name" value="{{ $user->id }}">{{ $user->name }}
                                                    </option>
                                                @endif
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button"data-id="{{ $subject->id }}"
                            class="btn btn-success add_subject_user_btn">Save</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>
