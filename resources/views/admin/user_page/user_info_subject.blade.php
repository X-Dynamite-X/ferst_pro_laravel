<div class="container pt-5 mt-3">
    <div class="g-col-4">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#CreatesubjectModel">
            Craate
        </button>

    </div>
</div>
<div class="container text-center">
    <div class="row">
        <table class="table table-hover" class="tbody">
            <thead>
                <tr>
                    <td scope="col">ID</td>
                    <td scope="col">Subject</td>
                    <td scope="col">Full Mark</td>
                    <td scope='col'>Add Student</td>
                    <td scope="col">Show Student</td>
                    <td scope="col">Edit</td>
                    <td scope="col">Delete</td>
                </tr>
            </thead>
            <tbody id="res">
                @foreach ($subjects as $subject)
                    <tr id="tr{{ $subject->id }}">
                        <td scope="row">{{ $subject->id }}</td>
                        <td scope="row" id="subject{{ $subject->id }}">{{ $subject->subject }}</td>
                        <td scope="row" id="full_mark{{ $subject->id }}">{{ $subject->full_mark }}</td>
                        <td scope="row">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#AddModelsubjectUser{{ $subject->id }}"
                                id="addSubjectUser{{ $subject->id }}">Add Student</button>
                        </td>
                        <td scope="row">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#ModelShowsubject{{ $subject->id }}"
                                id="showSubjectUser{{ $subject->id }}">Show</button>
                        </td>
                        <td scope="row">
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#EditModelsubject{{ $subject->id }}"
                                id="editSubjectUser{{ $subject->id }}">Edit</button>
                        </td>
                        <td scope="row">
                            <form id="form_delete_subject{{ $subject->id }}" calss="form_delete_subject"
                                action="{{ route('delete_subject', ['id' => $subject->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button data-id="{{ $subject->id }}" type="button" id="btn_delete_subject"
                                    class="btn btn-danger btn_delete_subject">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="container pb-5 mb-3">
    <div class="g-col-4">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#CreatesubjectModel">
            Craate
        </button>
    </div>
</div>
@section('js')
    <script>
        var url_delete = "{{ route('delete_subject', '') }}"
        var url_updata = "{{ route('update_subject', '') }}"
    </script>
@endsection
