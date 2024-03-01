<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\Chat;
use Illuminate\Broadcasting\Broadcasters\PusherBroadcaster;
use Pusher\Pusher;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($subject)
    {
        // $messages = Message::all();
        $user = Auth::user();

        // return view('studant.chat.chat',compact('messages','user'));
        $chats = Message::where('subject_id', $subject)->get();

        return view('studant.chat.chat', [
            'user'=>$user,
            'subject' => $subject,
            'chats' => $chats,
        ]);
    }


    public function broadcast(Request $request)
    {
        $validatedData = $request->validate([

            'subject_id' => 'required',
            'message' => 'required',
        ]);

        $chat = Message::create([
            'user_id' => Auth::user()->id,
            'subject_id' => $validatedData['subject_id'],
            'message' => $validatedData['message'],
        ]);
        $user = Auth::user()->name;

        broadcast(new Chat($chat->subject_id,$user , $chat->message))->toOthers();

        // broadcast (new Chat ($user,'public3' ,$message))->toOthers();

        return view('studant.chat.broadcast', ['message' => $chat]);
    }
    public function receive(Request $request,$subject)
    {
        $user = Auth::user()->name;
        return view('studant.chat.receive',['message' => $request['message'],'user'=>$request['user']]);
    }

    // public function store(Request $request)
    // {
    //      dd($request);
    //     event(new Chat(
    //         $request->input('username'),
    //         $request->input('message'),

    //     ));

    //     return true;


    //     // return view('studant.chat.chat');
    // }


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
