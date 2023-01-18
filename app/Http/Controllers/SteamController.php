<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Exception;
use Socialite;
use App\Models\User;
class SteamController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('steam')->redirect();
    }

    public function callback()
    {
        try {

            $user = Socialite::driver('steam')->user();

            echo($user->id . "<br />");
            echo($user->name . "<br />");
            echo($user->nickname . "<br />");
            echo($user->avatar . "<br />");

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
