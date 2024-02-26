@extends('include.index')

@section("css")
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
@endsection('scc')

@section('content')
    <div class=" jumbotron text-center mt-8">
        <h1>dynamite Chat</h1>

    </div>
    <div class=" comntainer m-8">
        <div class='row m-5 p-5 start-50'>
            <div class="col-xs-6">
                <div class='card'>
                    <div class="card-body">
                        <div class="" id="messageOutput">

                        </div>
                        <hr>
                        <form action="" id="form_message">
                            <div class="from-group mb-3">
                                <input type="text" class="form-control" id="message"
                                    placeholder=" Type your message here...">
                            </div>
                            <button type="submit" class="btn btn-success" id="message_btn">
                                send
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection


@section('js')


<script src="{{ mix('js/app.js') }}"></script>

@endsection("js")

