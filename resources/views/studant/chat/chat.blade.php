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
                <small>Online</small>
            </div>
        </div>
        <div class="messages">
            @foreach ($chats as $message)
                @if ($message->user->id != $user->id)
                    <div class="left message ">
                        <p>{{ $message->user->name }}</p>
                    </div>
                    <div class="left message">
                        <img src="{{ asset('img/-5818810161089854385_120.jpg') }}" alt="" srcset="">
                        <p>{{ $message->message }}</p>
                    </div>
                @else
                    <div class="right message">
                        <p>
                            {{ $message->user->name }}
                        </p>
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
                <input type="hidden" name="subject_id" value="{{ $subject }}">
                <input type="text" name="message" id="message" placeholder="Enter  your message...">
                <button class="send_msg " type="button"></button>
            </form>
        </div>
    </div>
@endsection


@section('js')
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
            var subjectId ="{{ $subject }}";
            var username ="{{ $user->name }}";

</script>
<script src="{{ asset('/js/chat/chat.js') }}"></script>

@endsection("js")
