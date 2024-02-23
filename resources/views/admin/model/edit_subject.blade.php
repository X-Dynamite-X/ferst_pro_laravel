<div id="editModel">
    @foreach ($subjects as $subject)
        <div class="modal fade " id="EditModelsubject{{ $subject->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="EditModelsubjectLabel{{ $subject->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 " id="EditModelsubjectLabel{{ $subject->id }}">{{ $subject->subject }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <form class='form_edit_subject' id="form_edit_subject{{ $subject->id }}"
                                action="{{ route('update_subject', ['id' => $subject->id]) }}" method="post">
                                @csrf
                                @method('put')
                                <div class="form">
                                    <div class="md-5">
                                        <label for="editsubject" class="form-label ">subject</label>
                                        <input type="text" name="editsubject" id="editsubject" class="form-control"
                                            placeholder="Enter subject:" value="{{ $subject->subject }}">
                                    </div>
                                    <div class="md-5">
                                        <label for="edit_mini_mark" class="form-label ">Mark</label>
                                        <input type="number" name="edit_mini_mark" id="edit_mini_mark" class="form-control"
                                            placeholder="Edit Mini Mark:" value="{{ $subject->mini_mark }}">
                                    </div>
                                    <div class="md-5">
                                        <label for="edit_full_mark" class="form-label ">Mark</label>
                                        <input type="number" name="edit_full_mark" id="edit_full_mark" class="form-control"
                                            placeholder="Edit Full Mark:" value="{{ $subject->full_mark }}">
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" data-id="{{ $subject->id }}"
                                class="edit_btn btn btn-success btn_update" id="btn_update">update</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>
