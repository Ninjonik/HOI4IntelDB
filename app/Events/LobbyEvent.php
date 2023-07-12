<?php

namespace App\Events;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use GetAvatar;

class LobbyEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $user;
    private $action;
    private /*User*/ $host;
    private Carbon $time;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user, $action, $host)
    {
        $this->action = $action;
        $this->user = $user;
        $this->host = $host ?? '';
        $this->time = Carbon::now();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PresenceChannel('presence.dashboard.lobby.1');
    }

    public function broadcastAs()
    {
        return "lobby";
    }

    public function broadcastWith()
    {
        return [
            "action" => $this->action,
            "user" => $this->user,
            "host" => $this->host,
            "time" => $this->time->toDateTimeString()
        ];
    }
}
