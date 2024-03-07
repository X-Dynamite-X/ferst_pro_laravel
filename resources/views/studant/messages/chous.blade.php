
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
            @if ($admin->is_admin == 1  && $admin->id != Auth::user()->id )
            <a href="{{ route('messages.show', ['senderUserId' => Auth::user()->id, 'receiverUserId' => $admin->id]) }}" class="d-block user_acaunt">
                <img src='{{ asset('user_profile/image/' . $admin->image) }}' class="img_avter d-inline" alt="" srcset="">

                <p class="d-inline">{{ $admin->name }}</p>
            </a>
            @endif
        @endforeach

        <hr>
        <h3 class="text-center">
            studant
        </h3>
        @foreach ($users as $user)
            @if ($user->is_admin == 0  && $user->id != Auth::user()->id)
            <a href="{{ route('messages.show', ['senderUserId' => Auth::user()->id, 'receiverUserId' => $user->id]) }}"  class="d-block user_acaunt">
                <img src='{{ asset('user_profile/image/' . $user->image) }}'class="img_avter d-inline"  alt="" srcset="">

                <p class="d-inline">{{ $user->name }}</p></a>
            @endif
        @endforeach

    </div>

    @endsection('side')

    @section('content')

    <div class="chat" data-bs-theme="dark">

        <div class="messages " id="messages">
        </div>
        <div class="mb-5 pb-5"></div>
        <div class="bottom ">
            <div class="bottom_input">
                <form  method="post">
                    @csrf

                    <input type="text" name="message_body" id="message" placeholder="Enter your message..."
                        onkeyup="handleKeyPress(event)" disabled>
                    <button class="send_msg" type="submit" disabled onclick="sendMessage()"></button>
                </form>
            </div>
        </div>



    @endsection
