<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NotifCounterEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $receiver_id;
    public $notifications_counter;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($receiver_id, $notifications_counter)
    {
        $this->receiver_id =  $receiver_id;
        $this->notifications_counter = $notifications_counter;
    }

    /**
 1    * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('notif_counter'.$this->receiver_id);
    }
}
