<div id="editModel">
@foreach ($subjects as $subject)
    <div class="modal fade "  id="EditModelsubject{{ $subject->id }}" data-bs-backdrop="static"
        data-bs-keyboard="false" tabindex="-1" aria-labelledby="EditModelsubjectLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 " id="EditModelsubjectLabel">{{ $subject->subject }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form id="form_edit_subject" action="{{ route('update_subject', ['id' => $subject->id]) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="form">
                                <div class="md-5">
                                    <label for="subject" class="form-label ">subject</label>
                                    <input type="text" name="editsubject" id="editsubject" class="form-control"
                                        placeholder="Enter subject:" value="{{ $subject->subject }}">
                                </div>
                                <div class="md-5">
                                    <label for="Mark" class="form-label ">Mark</label>
                                    <input type="number" name="editmark" id="Mark" class="form-control"
                                        placeholder="Enter Mark:" value="{{ $subject->full_mark }}">
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit"  class="btn btn-success" id="btn_update">update</button>

                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
</div>

