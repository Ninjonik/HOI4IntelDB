<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as Eloquent;
// use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Players extends Eloquent
{
    use HasFactory;

    public function ban()
    {
        return $this->hasOne(Ban::class, 'player_id', 'discord_id');
    }
}

