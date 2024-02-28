@extends('include.index')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/chat/chat.css') }}">
@endsection('scc')

@section('content')
    <div class="chat">
        <div class="top">
            <img src="{{ asset('img/-5818810161089854386_120.jpg') }}">
            <div class="">
                <p>Dynamite</p>
                <small>Online</small>
            </div>

        </div>
        <div class="messages">
            @include('studant.chat.receive', ['message' => 'Hey, how can I help you?'])
        </div>
        <div class="bottom">
            <form id="chatForm" action="{{ route('broadcast') }}" method="POST">
                @csrf
                <input type="text" name="message" id="message" placeholder="Enter  your message...">
                <button class="send_msg " type="button"></button>
            </form>
        </div>
    </div>
@endsection


@section('js')
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script src="{{ asset('/js/chat/chat.js') }}"></script>


    {{--
    <script>
        // Enable pusher logging - don't include this in production
        // var pusher = new Pusher('{{ config('broadcasting.connections.pusher.key') }}',{cluster:'ap2'});
        // const channel = pusher.subscribe('public');

        const pusher = new Pusher('0881139f278cbc02059c', {
            cluster: 'ap2',
            authEndpoint: '/broadcasting/auth',
            encrypted: true,
        });

        const channel = pusher.subscribe('public');

        channel.bind("chat", function(data) {
            console.log(data);
            $.post('/receive', {
                    _token: "{{ csrf_token() }}",
                    message: data.message,
                })
                .done(function(res) {
                    $('.messages > .message').last().after(res);
                    $(document).scrollTop($(document).height());
                });
        });

        $(document).on("click", ".send_msg", function() {
            var form = $("#chatForm");
            var formData = form.serialize();
            console.log(formData);
            $.ajax({
                    url: "/broadcast",
                    type: "post",
                    method: 'post',
                    socket_id: pusher.connection.socket_id,
                    data: formData,
                })
                .done(function(res) {
                    $('.messages > .message').last().after(res);
                    $('#message').val('');
                    $(document).scrollTop($(document).height());
                });
        });
    </script> --}}
@endsection("js")
