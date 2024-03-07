<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ChatUser;
use App\Events\ChatUserEvent;

class ChatUserController extends Controller
{

    public function chousMesagess($senderUserId){

        $users = User::all();

        return view('studant.messages.chous',[

            'users'=>$users,
        ]);


    }

    public function showMessages($senderUserId, $receiverUserId)
    {
        $users = User::all();
        $messages = ChatUser::where(function ($query) use ($senderUserId, $receiverUserId) {
            $query->where('sender_user_id', $senderUserId)
                ->where('receiver_user_id', $receiverUserId);
        })->orWhere(function ($query) use ($senderUserId, $receiverUserId) {
            $query->where('sender_user_id', $receiverUserId)
                ->where('receiver_user_id', $senderUserId);
        })->orderBy('created_at', 'asc')->get(); // ترتيب الرسائل حسب الزمن بترتيب تصاعدي

        return view('studant.messages.show', compact('messages', 'senderUserId', 'receiverUserId', 'users'));
    }

    public function sendMessage(Request $request, $senderUserId, $receiverUserId)
    {
        $request->validate([
            'message_body' => 'required',
        ]);

        $chatUser = ChatUser::create([
            'sender_user_id' => $senderUserId,
            'receiver_user_id' => $receiverUserId,
            'message_body' => $request->input('message_body'),
        ]);
        broadcast(new ChatUserEvent($chatUser->sender_user_id, $chatUser->receiver_user_id, $chatUser->message_body))->toOthers();
        $user = User::find($chatUser->sender_user_id);
        return view('studant.messages.broadcast', ['message_body' => $chatUser, 'user' => $user]);
    }

    public function receiveMessages(Request $request, $senderUserId, $receiverUserId)
    {
        $user = User::find($receiverUserId);
        // dd($request);
        return view('studant.messages.receive', ['message_body' => $request->input('message_body'), 'user' => $user]);
    }



}
