<div class="pt-5 ">
    <div class="p-5">
        <div class="grid gap-0 row row-gap-3  ">
            <div class="text-center col-8 position-relative top-0 start-50 translate-middle-x ">
                <table class="table table-striped table-hover">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Number of subjects</th>
                    </tr>
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $number_of_subjects }}</td>
                    </tr>
                </table>
            </div>
        </div>

    </div>
    <div class="p-5">
        <div class="grid gap-0 row row-gap-3  ">
            <div class="text-center col-8 position-relative top-0 start-50 translate-middle-x ">
                <table class="table table-striped table-hover">
                    <tr>
                        <th>Subjects</th>
                        <th>Minimum Mark for saccess</th>
                        <th>Full markers</th>
                        <th>markers</th>
                        <th>Messages</th>
                    </tr>
                    @foreach ($subjects_users as $subjects)
                        <tr>
                            <td>{{ $subjects->subject->subject }}</td>
                            <td>{{ $subjects->subject->mini_mark }}</td>
                            <td>{{ $subjects->subject->full_mark }}</td>
                            <td>{{ $subjects->user_mark }}</td>
                            <td>
                                 <button class="btn btn-primary">
                                    <a href="{{ route('chat', ['subject'=>$subjects->id]) }}" class="link-light message_link">
                                message</a>
                            </button>
                            </td>

                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
