<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AddSubscription
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $username;
    public $client_name;
    public $subscription;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($username, $client_name, $subscription)
    {
        $this->username = $username;
        $this->client_name = $client_name;
        $this->subscription = $subscription;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
