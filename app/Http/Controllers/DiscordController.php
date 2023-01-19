<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Exception;
use Socialite;
class DiscordController extends Controller
{
    public function Redirect()
    {
        return Socialite::driver('discord')->redirect();
    }

    public function Callback()
    {
        try {

            $user = Socialite::driver('discord')->user();

            dd($user);

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
