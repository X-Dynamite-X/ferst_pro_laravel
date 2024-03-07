<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\Chat;
use Illuminate\Broadcasting\Broadcasters\PusherBroadcaster;
use Pusher\Pusher;
use App\Models\Message;
use App\Models\Subject;
use App\Models\User;
use App\Models\SubjectUser;


use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($subject_id)
    {
        $user = Auth::user();
        $users = User::all();
        $subject = Subject::find($subject_id);
        $subject_users = $subject->users;
        $chats = Message::where('subject_id', $subject_id)->get();

        return view('studant.chat.chat', [
            'user' => $user,
            'subject_id' => $subject_id,
            'subject' => $subject,
            'chats' => $chats,
            'subject_users'=>$subject_users,
            'users'=>$users,
        ]);
    }


    public function broadcast(Request $request,$subject_id)
    {
        $validatedData = $request->validate([
            'subject_id' => 'required',
            'message' => 'required',
        ]);

        $chat = Message::create([
            'user_id' => Auth::user()->id,
            'subject_id' => $subject_id,
            'message' => $validatedData['message'],
        ]);
        broadcast(new Chat($chat->subject_id, $chat->user_id, $chat->message))->toOthers();
        $user = USer::find($chat->user_id);

        return view('studant.chat.broadcast', ['message' => $chat, "user" => $user]);
    }
    public function receive(Request $request, $subject_id)
    {
        $user = USer::find($request['user']);
        return view('studant.chat.receive', ['message' => $request['message'], 'user' => $user]);
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
