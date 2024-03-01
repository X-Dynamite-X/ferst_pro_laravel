@extends('include.index')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/chat/chat.css') }}">
    <link rel="stylesheet" href="{{ asset('css/chat/mycode.css') }}">

   
@endsection('scc')

@section('content')
    <div class="chat">
        <div class="top">
            <div class="">
                <p>{{ $subject->subject }}</p>
            </div>
        </div>
        <div class="messages">
            @foreach ($chats as $message)
                @if ($message->user->id != $user->id)
                    <div class="left message ">
                        <p>{{ $message->user->name }}</p>
                    </div>
                    <div class="left message">
                        <img src='{{ $message->user->image }}' alt="" srcset="">
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
                        <img src="{{ $message->user->image }}" alt="" srcset="">

                    </div>
                @endif
            @endforeach
        </div>
        <div class="bottom">
            <form id="chatForm" action="{{ route('broadcast') }}" method="POST">
                @csrf
                <input type="hidden" name="subject_id" value="{{ $subject_id }}">
                <input type="hidden" name="image_user" value="{{ $message->user->image }}">

                <input type="text" name="message" id="message" placeholder="Enter  your message...">
                <button class="send_msg " type="button"></button>
            </form>
        </div>
    </div>
@endsection


@section('js')
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
        var subjectId = "{{ $subject_id }}";
        var username = "{{ $user->id }}";
        // var image_user ="{{ $message->user->image }}";
    </script>
    <script src="{{ asset('/js/chat/chat.js') }}"></script>
@endsection("js")
