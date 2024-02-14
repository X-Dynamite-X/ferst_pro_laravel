{{-- user info --}}
<div class="container pt-5 mt-3">
    <div class="g-col-4">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#CreateModel">
            Craate
        </button>

    </div>
</div>
<div class="container text-center ">
    <div class="row">
        <table class="table  table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Emaile</th>
                    <th scope="col">acteve</th>
                    <th scope="col">Show</th>
                    <th scope="col">Edits</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr id="tr{{ $user->id }}">
                        <td scope="row">{{ $user->id }}</td>
                        <td scope="row">{{ $user->name }}</td>
                        <td scope="row">{{ $user->email }}</td>
                        <td scope="row">True</td>
                        <td scope="row"><button type="button" class="btn btn-primary"
                                id="show_user{{ $user->id }}" data-bs-toggle="modal"
                                data-bs-target="#ModelShow{{ $user->id }}">
                                Show
                            </button></td>
                        <td scope="row"><button type="button" class="btn btn-warning"
                                id="edit_user{{ $user->id }}" data-bs-toggle="modal"
                                data-bs-target="#EditModel{{ $user->id }}">
                                Edit
                            </button>
                        </td>
                        <td scope="row"><button class="btn btn-danger"
                                id="delete_user{{ $user->id }}">Delete</button> </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="container pb-5 mb-3">
    <div class="g-col-4">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#CreateModel">
            Craate
        </button>

    </div>
</div>
