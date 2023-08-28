<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Players;
use App\Models\PlayerRecords;
use App\Models\Ban;
use Livewire\WithPagination;
use GetName;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class PlayersIndex extends Component
{
    public $id_delete;
    public $id_ban;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';

    public function render()
    {
        $data = Players::when($this->search, function ($query, $search) {
            return $query->where('profile_link', 'like', '%' . $search . '%')
                ->orWhere('discord_id', 'like', '%' . $search . '%')
                ->orWhere('discord_name', 'like', '%' . $search . '%');
        })
            ->with('ban') // Eager load the ban relationship
            ->paginate(10);

        $data->each(function ($player) {
            $player->isBanned = $player->ban ? true : false;
            $player->banHost = $player->ban ? $player->ban->host_id : null;
            $player->banCreatedAt = $player->ban ? $player->ban->created_at : null;
            $player->banReason = $player->ban ? $player->ban->reason : null;
        });

        $playerRecords = [];

        return view('livewire.players-index', [
            'data' => $data,
            'playerRecords' => $playerRecords, // Add this line
        ])->layout('livewire.layouts.base');
    }

    public function viewRecords($playerId)
    {
        $playerId = intval($playerId);
        $this->playerRecords = PlayerRecords::where('player_id', $playerId)->with('host')->with('guild')->get();
        $this->dispatchBrowserEvent("openPlayerRecordsModal");
    }

    public function cancel()
    {
        $this->id_delete = "";
        $this->id_ban = "";
        $this->dispatchBrowserEvent("close-modal");
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function resetInputs()
    {
        $this->id_ban = "";
        $this->id_delete = "";
    }

    // BAN

    public function banConfirmation($id)
    {
        $this->id_ban = $id;
        $this->DispatchBrowserEvent("show-ban-modal");
    }

    public function banData()
    {
        $this->id_ban = intval($this->id_ban);

        $banUser = User::where('discord_id', $this->id_ban)->first();
        if($banUser){
            $userRole = (config('enums.ROLES')[Auth::user()->roles()->pluck('name')[0]]);
            $banUserRole = config('enums.ROLES')[$banUser->roles()->pluck('name')[0]];
            if($userRole <= $banUserRole){
                $this->DispatchBrowserEvent("not-enough-permissions");
                return;
            }
        }

        $ban = Ban::where('player_id', $this->id_ban)->first();

        $client = new Client();

        if ($ban) {
            try {
                $response = $client->patch(env('COMMS_URL').'/user/unban', [
                    'json' => [
                        'token' => env("COMMS_TOKEN"),
                        'player_id' => $this->id_ban,
                        'reason' => 'Unbanned using dashboard by '.Auth::user()->name,
                    ],
                ]);
                if ($response->getStatusCode() === 200) {
                    $this->dispatchBrowserEvent("unbanned");
                } else {
                    $this->dispatchBrowserEvent("banned-error");
                }
            } catch (RequestException $e) {
                // Handle request timeout or other exceptions
                $this->dispatchBrowserEvent("banned-error");
            }
        } else {
            if($this->id_ban) {
                try {
                    $response = $client->post(env('COMMS_URL').'/user/ban', [
                        'json' => [
                            'token' => env("COMMS_TOKEN"),
                            'player_id' => $this->id_ban,
                            'player_name' => 'undefined',
                            'host_id' => Auth::user()->discord_id,
                            'reason' => 'Banned using dashboard by '.Auth::user()->name,
                        ],
                    ]);
                    if ($response->getStatusCode() === 200) {
                        $this->dispatchBrowserEvent("banned");
                    } else {
                        $this->dispatchBrowserEvent("banned-error");
                    }
                } catch (RequestException $e) {
                    // Handle request timeout or other exceptions
                    $this->dispatchBrowserEvent("banned-error");
                }
            }
        }

        $this->resetInputs();
        $this->dispatchBrowserEvent("close-modal");
    }


    // DELETE

    public function deleteConfirmation($id)
    {
        $this->id_delete = $id;
        $this->DispatchBrowserEvent("show-delete-modal");
    }

    public function deleteData()
    {
        $data = Players::where("id", $this->id_delete)->first();
        if ($data) {
            $discord_id = $data->discord_id;
            PlayerRecords::where("player_id", $discord_id)->delete();
            $data->delete();
        }
        $this->resetInputs();
        $this->DispatchBrowserEvent("removed");
        $this->DispatchBrowserEvent("close-modal");
    }

}
