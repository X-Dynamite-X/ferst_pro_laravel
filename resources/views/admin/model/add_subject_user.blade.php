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
                            <form action="{{ route('add_user_for_subject', ['subject_id' => $subject->id]) }}"
                                method="post">
                                @csrf
                                <input type="hidden" name="subject_id"  value="{{ $subject->id }}">
                                <div class="md-5">
                                    <select id="user_ids" name="user_ids[]" multiple required>
                                            @foreach ($users as $user)
                                                <option name="name" value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>
