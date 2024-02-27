@extends('include.index')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/chat/chat.css') }}">
@endsection('scc')

@section('content')
<div class="chat">
    <div class="top">
        <img class="card-img-top w-25" src="{{ asset('img/-5818810161089854385_120.jpg') }}" alt="" srcset="">
        <div class="">
            <p>Dynamite</p>
            <small>Online</small>
        </div>
    </div>
    <div class="messages">
        @include('studant.chat.receive', ['message' => 'Hey! What`s up '])
        {{-- @include('studant.chat.broadcast') --}}
    </div>
    <div class="bottom input-group">
        <form id="chatForm" action="{{ url('/broadcast') }}" method="POST">
            @csrf
            <input type="text" name="message" class="input-form" id="message">
            <button type="submit" class="btn btn-primary send_msg"></button>
        </form>
    </div>
</div>
@endsection


@section('js')
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        // const pusher = new Pusher('{{config("broadcasting.connections.pusher.key")}}',{cluster:'ap2'});
        // const channel = pusher.subscribe('public');

        const pusher = new Pusher('0881139f278cbc02059c', {
    cluster: 'ap2',

    // Add the following line with your correct timezone
    authEndpoint: '/broadcasting/auth',
    encrypted: true,
});
const channel = pusher.subscribe('public');

        channel.bind("chat", function(data) {
            $.post('/receive', {
                _token: "{{csrf_token()}}",
                message: data.message,
            })
            .done(function(res) {
                $('.messages > .message').last().after(res);
                $(document).scrollTop($(document).height());
            });
        });

        $('#chatForm').submit(function(e) {
            e.preventDefault();

            $.ajax({
                url:"/broadcast",.
                type: "post",
                method: 'post',
                socket_id: pusher.connection.socket_id;

                data: {
                    _token: "{{ csrf_token() }}",
                    message: $("#message").val(),
                }
            })
            .done(function(res) {
                $('.messages').append(res);
                $('#message').val('');
                $(document).scrollTop($(document).height());
            });
        });
    </script>
@endsection("js")
