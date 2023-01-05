<?php

use App\Models\User;

function getAvatarFunction($size, $userId): string
{
    $userData = User::select("email", "profile_photo_path")
        ->where("id", $userId)
        ->first();
    $email = $userData->email;
    if($userData->profile_photo_path == "gravatar"){
        $default = "https://cdn-icons-png.flaticon.com/512/37/37943.png";
        $url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
    } else {
        $url = storage_path() . "avatars/" . $userData->profile_photo_path;
    }
    return $url;
}

