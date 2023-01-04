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

class StaffChatEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private string $message;
    private User $user;
    private Carbon $time;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(string $message, User $user)
    {
        $this->message = $message;
        $this->user = $user;
        $this->time = Carbon::now();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PresenceChannel('presence.dashboard.staff_chat.1');
    }

    public function broadcastAs()
    {
        return "staff_chat";
    }

    public function broadcastWith()
    {
        return [
            "message" => $this->message,
            "user" => $this->user->only(["name", "email"]),
            "time" => $this->time->toDateTimeString()
        ];
    }
}
