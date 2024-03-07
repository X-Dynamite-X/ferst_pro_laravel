<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatUserEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $sender_user_id = '';
    public $receiver_user_id='' ;
    public $message_body='' ;    /**
     * Create a new event instance.
     */
    public function __construct(string $sender_user_id, string $receiver_user_id,string $message_body)
    {
        $this->sender_user_id = $sender_user_id;
        $this->receiver_user_id =$receiver_user_id;
        $this->message_body =$message_body;
        }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */

//from dynamite to madara

    public function broadcastOn(): array
    {
        return ['from' . $this->sender_user_id . 'to' . $this->receiver_user_id];

    }
    public function broadcastAs ():string
    {
        return 'chatuser';

    }
}
