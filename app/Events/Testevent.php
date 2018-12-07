<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class Testevent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $message;
    public $name;
    public $id;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($id,$message,$name)
    {
        $this->message=$message; 
        $this->name=$name;
          $this->id=$id;      
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {

        return new Channel('id.'.$this->message);
    }
    public function broadcastWith()
{
    return ['id'=>$this->id,'name' => $this->name,'seen'=>false];
}


}
