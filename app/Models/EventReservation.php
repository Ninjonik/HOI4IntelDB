<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventReservation extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->hasOne(Players::class, 'discord_id', 'player_id');
    }
}
