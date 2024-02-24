<div class="pt-5 ">

    {{--
    <div class="grid gap-0 row row-gap-3">
        <div class="pt-5 p-lg-5 col-8">
            <p>test</p>
        </div>
    </div> --}}

    {{-- <div class="grid gap-0 row row-gap-3">
        <div class="p-5 col-6">
            <div class="card card-group">
                <div class="card-title">
                    <h5 class="p-2">subject</h5>
                </div>
                <img src="/img/4.jpg" class="card-img-top">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                </div>
            </div>
        </div>
        <div class="p-5 col-6">
            <div class="card card-group">
                <img src="/img/4.jpg" class="card-img-top">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                </div>
            </div>
        </div>
    </div>
    --}}

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
                    </tr>
                    @foreach ($subjects_users as $subjects)
                        <tr>
                            <td>{{ $subjects->subject->subject }}</td>
                            <td>{{ $subjects->subject->mini_mark }}</td>
                            <td>{{ $subjects->subject->full_mark }}</td>
                            <td>{{ $subjects->user_mark }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
