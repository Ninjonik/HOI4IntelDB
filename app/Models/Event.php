<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->hasOne(User::class, 'discord_id', 'host_id');
    }

    public function player_records()
    {
        return $this->hasMany(PlayerRecords::class, 'event_id', 'message_id');
    }

    public function reservations()
    {
        return $this->hasMany(EventReservation::class, 'event_message_id', 'message_id');
    }
}
