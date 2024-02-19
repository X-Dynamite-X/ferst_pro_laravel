<div class="ModelShowsubject">

    @foreach ($subjects as $subject)
        <div class="modal fade" aria-hidden="true" id="ModelShowsubject{{ $subject->id }}" data-bs-backdrop="static"
            data-bs-keyboard="false" tabindex="-1" aria-labelledby="ModelShowsubjectLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg w-100">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 " id="ModelShowsubjectLabel">{{ $subject->id }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <td scope="col">ID User </td>
                                    <td scope="col">Username</td>
                                    <td scope="col">subject</td>
                                    <td scope="col">Mark</td>
                                    
                                    <td scope="col">Edit</td>
                                    <td scope="col">delete</td>
                                </tr>
                            </thead>
                            <tbody id="tr_show_user_subject{{$subject->id}}">
                                @foreach ($subject->users as $user)
                                    <tr id="row_show_user_subject{{ $subject->id }}{{ $user->id }}">
                                        <td>{{ $user->id }}</td>
                                        <td class="subjects_user_id{{$user->id}}">{{ $user->name }}</td>
                                        <td class="subject_users_id{{$subject->id}}">{{ $subject->subject }}</td>
                                        <td id="subject_user_mark{{ $subject->id }}{{ $user->id }}">
                                            {{ $user->pivot->user_mark }}</td>
                                        <td>
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#EditModelsubjectUser{{ $subject->id }}{{ $user->id }}">Edit</button>
                                        </td>
                                        <td>
                                            <form
                                                action="{{ route('delete_user_mark', ['subject_id' => $subject->id, 'user_id' => $user->id]) }}"
                                                id="form_delete_subject_user{{$subject->id}}{{$user->id}}" method="post">
                                                @csrf
                                                @method("delete")
                                                <button data-user_id="{{ $user->id }}"
                                                    data-subject_id="{{ $subject->id }}"
                                                    data-subject="{{ $subject->subject }}"
                                                    data-user="{{ $user->name }}"
                                                    type="button"
                                                    class="btn btn-danger btn_delete_subject_user">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
