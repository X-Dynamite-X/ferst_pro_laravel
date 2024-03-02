@extends('include.index')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/chat/chat.css') }}">
    <link rel="stylesheet" href="{{ asset('css/chat/mycode.css') }}">
@endsection('scc')

@section('content')
    <div class="chat">
        <div class="top text-center">
                <h1>{{ $subject->subject }}</h1>
        </div>
        <div class="messages " id="messages">
            @foreach ($chats as $message)
                @if ($message->user->id != $user->id)
                    <div class="left message ">
                        <p>{{ $message->user->name }}</p>
                    </div>
                    <div class="left message">
                        <img src='{{ asset('user_profile/image/' . $message->user->image) }}' alt="" srcset="">
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

                        <img src="{{ asset('user_profile/image/' . $message->user->image) }}" alt="" srcset="">

                    </div>
                @endif
            @endforeach
        </div>
        <div>
            <br>
            <br>
        </div>
        <div class="bottom">
            <div class="bottom_input">

                <form id="chatForm" action="{{ route('broadcast') }}" method="POST">
                    @csrf
                    <input type="hidden" id='subject_id' name="subject_id" value="{{ $subject_id }}">
                    <input type="text" name="message" id="message" placeholder="Enter your message...">
                    <button class="send_msg" type="button"></button>
                </form>
            </div>
        </div>
    @endsection


    @section('js')
        <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
        <script>
            var username = "{{ $user->id }}";
        </script>
        <script src="{{ asset('/js/chat/chat.js') }}"></script>
    @endsection("js")
