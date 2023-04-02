<?php

use App\Http\Controllers\DiscordController;
use App\Http\Controllers\GitHubController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\StaffChatController;
use App\Http\Controllers\SteamController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LandingController::class, 'index']);
Route::get('auth/github', [GitHubController::class, 'gitRedirect']);
Route::get('auth/github/callback', [GitHubController::class, 'gitCallback']);
Route::get('steam/{id}', [SteamController::class, 'init']);
Route::get('auth/steam', [SteamController::class, 'redirect']);
Route::get('auth/steam/callback', [SteamController::class, 'callback']);
Route::get('auth/discord', [DiscordController::class, 'Redirect']);
Route::get('auth/discord/callback', [DiscordController::class, 'Callback']);

Route::get('/dashboard', [\App\Http\Controllers\PanelIndex::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/dashboard/chat', [\App\Http\Controllers\StaffChatController::class, 'index'])->middleware(['auth'])->name('dashboard/chat');
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});
Route::get('/dashboard/guilds', \App\Http\Livewire\GuildsComponent::class);

Route::view("/websocket/test", "websocket");

Route::get("/websocket", function () {
    event(new \App\Events\StaffChatEvent("test", Auth::user()));
    return null;
});
Route::post("/dashboard/chat/send", function(Request $request){
    $staffChatController = new StaffChatController;
    $staffChatController->store($request->message);
    return null;
});

Route::get("/test", function (Request $request) {
    $staffChatController = new StaffChatController;
    $staffChatController->store("kokos");
    return null;
});

