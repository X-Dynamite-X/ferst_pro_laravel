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
    public function index()
    {
        $messages = Message::all();
        $user = Auth::user();

        return view('studant.chat.chat',compact('messages','user'));
    }


    public function broadcast(Request $request)
    {
        $message = $request->get('message');
        $user = Auth::user()->name;

        $cre_message = Message::create([
            'name' =>$user,
            'message' => $request->input('message'),
        ]);
        broadcast (new Chat ($user ,$message))->toOthers();

        return view('studant.chat.broadcast',['message'=> $request->get( 'message'),'username'=> $user]);
    }
    public function receive(Request $request)
    {
        $user = Auth::user()->name;

        return view('studant.chat.receive',['message'=> $request->get( 'message'),'username'=> $user]);
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
