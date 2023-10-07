<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerNotes extends Model
{
    use HasFactory;

    public function host()
    {
        return $this->belongsTo(Players::class, 'host_id', 'discord_id');
    }

    public function player()
    {
        return $this->belongsTo(Players::class, 'player_id', 'discord_id');
    }

    public function guild()
    {
        return $this->belongsTo(Settings::class, 'guild_id', 'guild_id');
    }
}
