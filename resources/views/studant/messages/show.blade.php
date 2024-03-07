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
            @if ($admin->is_admin == 1 && $admin->id != Auth::user()->id)
                <a href="{{ route('messages.show', ['senderUserId' => Auth::user()->id, 'receiverUserId' => $admin->id]) }}"
                    class="d-block user_acaunt">
                    <img src='{{ asset('user_profile/image/' . $admin->image) }}' class="img_avter d-inline" alt=""
                        srcset="">

                    <p class="d-inline">{{ $admin->name }}</p>
                </a>
            @endif
        @endforeach

        <hr>
        <h3 class="text-center">
            studant
        </h3>
        @foreach ($users as $user)
            @if ($user->is_admin == 0 && $user->id != Auth::user()->id)
                <a href="{{ route('messages.show', ['senderUserId' => Auth::user()->id, 'receiverUserId' => $user->id]) }}"
                    class="d-block user_acaunt">
                    <img src='{{ asset('user_profile/image/' . $user->image) }}'class="img_avter d-inline" alt=""
                        srcset="">

                    <p class="d-inline">{{ $user->name }}</p>
                </a>
            @endif
        @endforeach

    </div>



@section('content')

    <div class="chat" data-bs-theme="dark">

        <div class="messages " id="messages">
            @foreach ($messages as $message)
                @if ($message->senderUser->id != Auth::user()->id)
                    <div class="left message ">
                        <p>{{ $message->senderUser->name }}</p>
                    </div>
                    <div class="left message">
                        <img src='{{ asset('user_profile/image/' . $message->senderUser->image) }}' alt=""
                            srcset="">
                        <p>{{ $message->message_body }}</p>
                    </div>
                @else
                    <div class="right message">
                        <p>
                            {{ $message->senderUser->name }}
                        </p>
                    </div>
                    <div class="right message">
                        <p>{{ $message->message_body }}</p>
                        <img src="{{ asset('user_profile/image/' . $message->senderUser->image) }}" alt=""
                            srcset="">
                    </div>
                @endif
            @endforeach
        </div>
        <div class="mb-5 pb-5"></div>
        <div class="bottom ">
            <div class="bottom_input">
                <form
                    action="{{ route('messages.send', ['senderUserId' => Auth::user()->id, 'receiverUserId' => $receiverUserId]) }}"
                    id="chatUserForm" method="post">
                    @csrf
                    <input type="hidden" id='senderUser' name="senderUser" value="{{ Auth::user()->id }}">
                    <input type="text" name="message_body" id="message_user" placeholder="Enter your message..."
                        onkeyup="handleKeyPress(event)">
                    <button class="send_user_msg" type="button" onclick="sendMessage()"></button>
                </form>
            </div>
        </div>



    @endsection
    @section('js')
        <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
        <script>
            var senderUser = '{{ Auth::user()->id }}';
            var receiverUserId = '{{ $receiverUserId }}';
            var receive = "{{ route('messages.receive', [  'senderUserId' => Auth::user()->id , 'receiverUserId' => $receiverUserId]) }}" ;
        </script>
        <script src="{{ asset('js/chatuser/chatuser.js') }}"></script>

    @endsection
