<div class="pt-5 ">
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
                                {{-- <button class="btn btn-success"> --}}
                                    <a href="{{ route('chat', ['subject_id' => $subjects->subject->id]) }}"
                                        class="btn btn-success message_link">
                                        message</a>
                                {{-- </button> --}}
                            </td>

                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
