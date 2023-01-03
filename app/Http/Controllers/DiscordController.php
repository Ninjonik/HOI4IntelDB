<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Exception;
use Socialite;
use App\Models\User;
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

            $searchUser = User::where('discord_id', $user->id)->first();

            if($searchUser){

                Auth::login($searchUser);

                return redirect('/dashboard');

            } else {
                $authUser = User::create([
                    'name' => $user->nickname,
                    'email' => $user->email,
                    'discord_id'=> $user->id,
                    'auth_type'=> 'discord',
                    'password' => encrypt('randomencryptos2568')
                ]);

                Auth::login($authUser);

                return redirect('/dashboard');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
