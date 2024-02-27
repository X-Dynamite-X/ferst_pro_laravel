<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\Chat;
use Illuminate\Broadcasting\Broadcasters\PusherBroadcaster;
use Pusher\Pusher;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('studant.chat.chat');
    }



    public function broadcast(Request $request)
    {
        broadcast (new Chat ($request->get('message')))->toOthers();
        return view('studant.chat.chat',['message'=> $request->get( 'message')]);
    }
    public function receive(Request $request)
    {

        return view('studant.chat.chat',['message'=> $request->get( 'message')]);
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
