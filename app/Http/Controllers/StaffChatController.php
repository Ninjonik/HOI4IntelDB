<?php

namespace App\Http\Controllers;

use App\Models\DashboardChat;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravolt\Avatar\Avatar;

class StaffChatController extends Controller
{
    public function index()
    {
        $chats = DashboardChat::with('user')->get()->reverse();
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
}
