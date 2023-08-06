<?php

namespace App\Http\Controllers;

use App\Models\Ban;
use App\Models\PlayerRecords;
use App\Models\Players;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Socialite;

class DataRequestController extends Controller
{
    public function generatePdf()
    {
        if (!auth()->check()) {
            return redirect('auth/discord');
        }

        $user = User::where('id', auth()->id())->first();
        $player = Players::where('discord_id', $user->discord_id)->first();

        if (!$player) {
            return response()->json(['error' => 'Player not found.'], 404);
        }

        // Fetch player records based on player_id and host_id
        $playerRecords = PlayerRecords::where('player_id', $player->discord_id)->get();

        // Fetch bans based on player_id
        $bans = Ban::where('player_id', $player->discord_id)->get();

        // Generate PDF using the fetched data
        $pdf = PDF::loadView('pdf.player_report', compact('player', 'playerRecords', 'bans', 'user'));

        // Set the filename for the downloaded PDF
        $filename = 'player_report_' . $player->discord_id . '.pdf';

        // Download the PDF
        return $pdf->download($filename);
    }
}
