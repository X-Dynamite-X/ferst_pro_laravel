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
                    <th scope="col">Email</th>
                    <th scope="col">Acteve</th>
                    <th scope="col">Show</th>
                    <th scope="col">Edits</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody id="row_user">
                @foreach ($users as $user)
                @if($user->id !== $user_auth->id)
                    <tr id="tr{{ $user->id }}">
                        <td scope="row">{{ $user->id }}</td>
                        <td scope="row" id="name{{ $user->id }}">{{ $user->name }}</td>
                        <td scope="row" id="email{{ $user->id }}">{{ $user->email }}</td>
                        <td scope="row "id="actev{{ $user->id }}"
                            class="is_actev {{ $user->is_actev ? 'text-success i' : 'text-danger' }}">
                            {{ $user->is_actev ? 'Is Actev' : 'Not Actev' }}
                        </td>
                        <td scope="row">
                            <button type="button" class="btn btn-primary" id="show_user{{ $user->id }}"
                                data-bs-toggle="modal" data-bs-target="#ModelShow{{ $user->id }}">
                                Show
                            </button>
                        </td>
                        <td scope="row">
                            <button type="button" class="btn btn-warning" id="edit_user{{ $user->id }}"
                                data-bs-toggle="modal" data-bs-target="#EditModel{{ $user->id }}">
                                Edit
                            </button>
                        </td>
                        <td scope="row">
                            <form id="form_delete_user{{ $user->id }}"
                                action="{{ route('delete_user', ['id' => $user->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="button" data-name="{{ $user->name }}" data-id="{{ $user->id }}"
                                    class="btn btn-danger btn_delete_user"
                                    id="delete_user{{ $user->id }}">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endif
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
@section('js')
    <script>
        var csrf_token = "{{ csrf_token() }}";
        var url_edit_user = "{{ route('edit_user', '') }}"
        var url_delete_user = "{{ route('delete_user', '') }}"
    </script>
@endsection
