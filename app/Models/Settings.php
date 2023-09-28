<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    /**
     * @var \Illuminate\Support\HigherOrderCollectionProxy|mixed
     */
    protected $ŧable ="Settings";

    public function playerRecords()
    {
        return $this->hasMany(PlayerRecords::class, 'guild_id', 'guild_id');
    }
}
