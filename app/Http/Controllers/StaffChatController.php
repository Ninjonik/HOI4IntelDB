<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Statistics;
use Illuminate\Support\Facades\DB;

class StaffChatController extends Controller
{
    public function index()
    {
        return view('panel/chat');
    }
}
