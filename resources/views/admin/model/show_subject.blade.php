<div class="ModelShowsubject">

@foreach ( $subjects as $subject )
<div class="modal fade" aria-hidden="true" id="ModelShowsubject{{ $subject->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="ModelShowsubjectLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg w-100">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 " id="ModelShowsubjectLabel">c++</h1>
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
                            {{-- <td scope="col">Show </td> --}}
                            <td scope="col">Edit</td>
                            <td scope="col">delete</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $users as $user )
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$subject->subject}}</td>
                            <td>50</td>
                            {{-- <td>show</td> --}}
                            <td>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    {{-- data-bs-target="#EditModelsubjectUser{{$subject->id}}" --}} data-bs-target="#EditModelsubjectUser">Edit</button>
                            </td>
                            <td><button class="btn btn-danger" >Delete</button></td>
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
