<?php

use App\Models\User;

function getNameFunction($discordId): string
{
    $userData = User::select("name")
        ->where("discord_id", $discordId)
        ->first();
    return $userData ? $userData->name : 'error';
}
