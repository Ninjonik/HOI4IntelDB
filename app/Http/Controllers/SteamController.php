<?php
namespace App\Http\Controllers;
use App\Models\Players;
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
            dd($user);
            echo $user->id;
            echo $this->id;

            $url = "https://api.steampowered.com/IPlayerService/GetOwnedGames/v1/?key=".env("STEAM_CLIENT_SECRET")."&steamid=".$user->id."&format=json";
            $json = file_get_contents($url);
            $json = json_decode($json);
            $gamesData = $json->response->games;

            $hoi = false;

            foreach($gamesData as $gameData){
                if ($gameData->appid == 394360) {
                    $hoi = true;
                }
            }

            if ($hoi){
                $user = Players::where('steam_id', '=', $user->id);
                if ($user === null) {
                    // user doesn't exist
                }
                $status = "There has been an error...";
                $description = "There has been an error with validating your steam account. This may be caused by either
                Private Profile or by you not having Hearts of Iron IV bought on your steam account.
                Once you resolve these issues you can try again.";
            } else {
                $status = "There has been an error...";
                $description = "There has been an error with validating your steam account. This may be caused by either
                Private Profile or by you not having Hearts of Iron IV bought on your steam account.
                Once you resolve these issues you can try again.";
            }

            $data = [
                "status" => $status,
                "description" => $description
            ];
            return view("steam_api", ["data"=>$data]);


        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
