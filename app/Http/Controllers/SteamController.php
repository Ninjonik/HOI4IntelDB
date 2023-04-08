<?php
namespace App\Http\Controllers;
use App\Models\Players;
use Illuminate\Http\Request;
use Auth;
use Exception;
use Illuminate\Support\Facades\Session;
use Socialite;
use App\Models\User;
use function PHPUnit\Framework\isEmpty;

class SteamController extends Controller
{

    public function init($id)
    {
        Session::put('discord_id', $id);
        return redirect('/auth/steam');
    }

    public function redirect()
    {
        return Socialite::driver('steam')->redirect();
    }

    public function callback()
    {
        try {

            $user = Socialite::driver('steam')->user();
            $discord_id = intval(Session::get('discord_id'));

            $steam_url = $user->user["profileurl"];

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
                print($discord_id);
                $player = Players::where('discord_id', $discord_id)->first();
                if(empty($player->rating)){
                    try {
                        $new_player = new Players();
                        $new_player->steam_id = $user->id;
                        $new_player->discord_id = $discord_id;
                        $new_player->rating = 0.5;
                        $new_player->profile_link = $steam_url;
                        $new_player->save();
                        $status = "Success!";
                        $description = "Your steam account has been successfully linked with your new discord account. Please run /verify command again on the discord server.";
                    } catch (Exception $e) {
                        $status = "There has been an error...";
                        $description = "There has been an error with validating your steam account. This is caused by
                        your steam account already being linked with another discord account.
                        Once you resolve this issue you can try again. Feel free to Contact HOI4Intel's Staff.";
                    }
                } else {
                    try {
                        Players::where('discord_id', $discord_id)
                            ->update(['steam_id' => $user->id, 'profile_link' => $steam_url]);
                        $status = "Success!";
                        $description = "Your steam account has been successfully linked with your discord account. Please run /verify command again on the discord server.";
                    } catch (Exception $e) {
                        $status = "There has been an error...";
                        $description = "Your steam account has already been linked with this discord account.";
                    }
                }
            } else {
                $status = "There has been an error...";
                $description = "There has been an error with validating your steam account. This may be caused by either
                Private Profile or by you not having Hearts of Iron IV bought on your steam account.
                Or this steam account has already been linked to other discord account.
                Once you resolve these issues you can try again. Feel free to Contact HOI4Intel's Staff.";
            }

            $data = [
                "status" => $status,
                "description" => $description
            ];
            return view("steam_api", ["data"=>$data]);


        } catch (Exception $e) {
            $status = "There has been an error...";
            $description = "There has been an error with validating your steam account. This may be caused by either
                Private Profile or by you not having Hearts of Iron IV bought on your steam account.
                Or this steam account has already been linked to other discord account.
                Once you resolve these issues you can try again. Feel free to Contact HOI4Intel's Staff.";
            $data = [
                "status" => $status,
                "description" => $description
            ];
            return view("steam_api", ["data"=>$data]);
            // dd($e->getMessage());
        }
    }
}
