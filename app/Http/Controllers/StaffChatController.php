<?php

namespace App\Http\Controllers;

use App\Models\DashboardChat;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StaffChatController extends Controller
{
    public function index()
    {
        // get messages from Dashboard model while also getting attached user information to each message by foreign key user_id
        // let result be $chats
        $chats = DashboardChat::with('user')->get();
        return view('panel/chat', compact('chats'));
    }
    public function store($message)
    {
        $chat = new DashboardChat();
        $chat->message = $message;
        $chat->user_id = Auth::id();
        $chat->save();
        event(new \App\Events\StaffChatEvent($message, auth()->user()));
        return null;
    }

    private function DashboardChat()
    {
    }
}
