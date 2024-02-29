@extends('include.index')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/chat/chat.css') }}">
    <link rel="stylesheet" href="{{ asset('css/chat/mycode.css') }}">

    <style>
        .bg_green {
    background-color: darkgreen;

}
    </style>

@endsection('scc')

@section('content')
    <div class="chat">
        <div class="top">
            <img src="{{ asset('img/-5818810161089854386_120.jpg') }}">
            <div class="">
                <p>{{$user->name}}</p>
                <small>Online</small>
            </div>
        </div>
        <div class="messages">
            @foreach ($messages as $message)
                @if ($message->name != $user->name)
                    <div class="left message ">
                        <p>{{$message->name}}</p>
                    </div>
                    <div class="left message">
                        <img src="{{ asset('img/-5818810161089854385_120.jpg') }}" alt="" srcset="">
                        <p>{{ $message->message }}</p>
                    </div>
                @else
                    <div class="right message">
                            <p>{{$message->name}}</p>
                    </div>
                    <div class="right message">
                        <p>{{ $message->message }}</p>
                        <img src="{{ asset('img/-5818810161089854387_120.jpg') }}" alt="" srcset="">
                    </div>
                @endif
            @endforeach
        </div>
        <div class="bottom">
            <form id="chatForm" action="{{ route('broadcast') }}" method="POST">
                @csrf
                <input type="hidden" name="name" value="{{ $user->name }}">
                <input type="text" name="message" id="message" placeholder="Enter  your message...">
                <button class="send_msg " type="button"></button>
            </form>
        </div>
    </div>
@endsection


@section('js')
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script src="{{ asset('/js/chat/chat.js') }}"></script>

    {{-- <script>
        var username ="{{$user->name}}";
    </script> --}}
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
