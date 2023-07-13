<?php

namespace App\Events;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LobbyEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $user;
    private $action;
    private $host;
    private $lobby_id;
    private Carbon $time;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user, $action, $host, $lobby_id)
    {
        $this->action = $action;
        $this->user = $user;
        $this->host = $host ?? '';
        $this->lobby_id = $lobby_id;
        $this->time = Carbon::now();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PresenceChannel('presence.dashboard.lobby.'.$this->lobby_id);
    }

    public function broadcastAs()
    {
        return "lobby.".$this->lobby_id;
    }

    public function broadcastWith()
    {
        return [
            "action" => $this->action,
            "user" => $this->user,
            "host" => $this->host,
            "lobby_id" => $this->lobby_id,
            "time" => $this->time->toDateTimeString()
        ];
    }
}
