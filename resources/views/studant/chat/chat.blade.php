@extends('include.index')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/chat/chat.css') }}">
    <link rel="stylesheet" href="{{ asset('css/chat/side.css') }}">
    <link rel="stylesheet" href="{{ asset('css/chat/chatUser.css') }}">



    {{-- <link rel="stylesheet" href="{{ asset('css/chat/mycode.css') }}"> --}}
@endsection('scc')

@section('side')
    <div class="sidenav "data-bs-theme="dark">
        <h3 class="text-center">
            Admin
        </h3>
        @foreach ($users as $admin)
            @if ($admin->is_admin == 1)
            <a href="{{ route('messages.show', ['senderUserId' => Auth::user()->id, 'receiverUserId' => $admin->id]) }}" class="d-block user_acaunt">
                <img src='{{ asset('user_profile/image/' . $admin->image) }}' class="img_avter d-inline" alt="" srcset="">

                <p class="d-inline">{{ $admin->name }}</p>
            </a>            @endif
        @endforeach

        <hr>
        <h3 class="text-center">
            studant
        </h3>
        @foreach ($subject_users as $subject_user)
        <a href="{{ route('messages.show', ['senderUserId' => Auth::user()->id, 'receiverUserId' => $subject_user->id]) }}"  class="d-block user_acaunt">
            <img src='{{ asset('user_profile/image/' . $subject_user->image) }}'class="img_avter d-inline"  alt="" srcset="">

            <p class="d-inline">{{ $subject_user->name }}</p></a>        @endforeach

    </div>
@endsection
@section('content')
    <div class="chat" data-bs-theme="dark">
        <div class="top text-center">
            <h1>{{ $subject->subject }}</h1>
            @include('studant.chat.welcome_subject_chat', ['message' => ' welcome this subject'])
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
                        <img src="{{ asset('user_profile/image/' . $message->user->image) }}" alt=""
                            srcset="">
                    </div>
                @endif
            @endforeach
        </div>
        <div class="mb-5 pb-5"></div>
        <div class="bottom ">
            <div class="bottom_input">
                <form id="chatForm" onsubmit="return false;" action="{{ route('broadcast', ['subject_id' => $subject->id]) }}" method="POST">
                    @csrf
                    <input type="hidden" id='subject_id' name="subject_id" value="{{ $subject_id }}">
                    <input type="text" name="message" id="message" placeholder="Enter your message..."
                        onkeyup="handleKeyPress(event)">
                    <button class="send_msg" type="button" onclick="sendMessage()"></button>
                </form>
            </div>
        </div>
    @endsection


    @section('js')
        <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
        <script>
            var username = "{{ Auth()->user()->id }}";
        </script>
        <script src="{{ asset('/js/chat/chat.js') }}"></script>
    @endsection("js")
