<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Chat implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $message = '';
    public $subjectId='' ;
    public $user_id='' ;




    /**
     * Create a new event instance.
     */
    public function __construct(string $subjectId,string   $user_id , string $message)
    {

        $this->subjectId = $subjectId;
        $this->user_id =$user_id;
        $this->message =$message;


    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return ['chat' . $this->subjectId];
    }
    public function broadcastAs ():string
    {
        return "chat";
    }
}
