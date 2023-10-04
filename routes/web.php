<?php

use App\Events\LobbyEvent;
use App\Http\Controllers\DataRequestController;
use App\Http\Controllers\DiscordController;
use App\Http\Controllers\GitHubController;
use App\Http\Controllers\GuildController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PanelIndex;
use App\Http\Controllers\StaffChatController;
use App\Http\Controllers\SteamController;
use App\Http\Controllers\WikiIndexController;
use App\Http\Controllers\WikiCategoryController;
use App\Http\Controllers\WikiArticleController;
use App\Http\Controllers\WikiSearchController;
use App\Http\Livewire\Events;
use App\Http\Livewire\GuildsComponent;
use App\Http\Livewire\GuildSettings;
use App\Http\Livewire\LobbyController;
use App\Http\Livewire\PlayersIndex;
use App\Http\Livewire\UsersIndex;
use App\Http\Livewire\ViewEvent;
use App\Http\Livewire\WikiArticle;
use App\Http\Livewire\WikiCategory;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\PlayerRecordsModal;
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
Route::get('/data-request', [DataRequestController::class, 'generatePdf'])->name('data-request');
Route::get('/PrivacyPolicy.pdf', function () {
    $filePath = public_path('PrivacyPolicy.pdf');
    return response()->file($filePath);
})->name('privacy_policy_pdf');
Route::get('/cookies.pdf', function () {
    $filePath = public_path('cookies.pdf');
    return response()->file($filePath);
})->name('cookies_pdf');

Route::redirect('/status', env("STATUS_URL"))->name('status');
Route::view('/403', 'errors.403');
Route::view('/test', "test");

Route::get('/wiki', [WikiIndexController::class, 'index'])->name('wiki');
Route::get('/wiki/category/{id}/{title}', [WikiCategoryController::class, 'show'])->name('wiki.category');
Route::get('/wiki/article/{id}/{title}', [WikiArticleController::class, 'show'])->name('wiki.article');
Route::post('/wiki/search', [WikiSearchController::class, 'show'])->name('wiki.search');



Route::get('auth/github', [GitHubController::class, 'gitRedirect']);
Route::get('auth/github/callback', [GitHubController::class, 'gitCallback']);
Route::get('steam/{id}', [SteamController::class, 'init']);
Route::get('auth/steam', [SteamController::class, 'redirect'])->name('auth/steam');;
Route::get('auth/steam/callback', [SteamController::class, 'callback']);
Route::get('auth/discord', [DiscordController::class, 'Redirect'])->name('auth/discord');
Route::get('auth/discord/callback', [DiscordController::class, 'Callback']);
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::post('/lobby/send', function (Request $request) {
    if ($request->token == env('COMMS_TOKEN')) {
        event(new LobbyEvent($request->user, $request->action, auth()->user(), $request->lobby_id));
        return response()->json(['success' => $request->lobby_id]);
    } else {
        return response()->json(['error' => 'invalid token'], 400);
    }
});
Route::post('/lobby/edit', function (Request $request) {
    $client = new Client();
    $response = $client->patch(env('COMMS_URL').'/edit/user', [
        'json' => [
            'token' => env("COMMS_TOKEN"),
            'guild_id' => $request->guild_id,
            'player_id' => $request->player_id,
            'player_new_name' => $request->player_new_name,
        ],
    ]);

    if ($response->getStatusCode() === 200) {
        return response()->json(['success' => $request], 200);
    } else {
        return response()->json(['error' => "error"], 400);
    }
});

Route::prefix('dashboard')->middleware(['auth', 'permissions.view-dashboard'])->group(function () {
    Route::get('/', [PanelIndex::class, 'index'])->name('dashboard');
    Route::post('/chat/send', function (Request $request) {
        $staffChatController = new StaffChatController;
        $staffChatController->store($request->message);
        return null;
    });
    Route::get('/chat', [StaffChatController::class, 'index'])->name('dashboard.chat');
    Route::get('/players', PlayersIndex::class);

    Route::get('/users', UsersIndex::class)->middleware(['auth', 'permissions.admin-dashboard']);
    Route::get('/guilds', GuildsComponent::class)->middleware(['auth', 'permissions.admin-dashboard']);
    Route::get('/wiki/categories', WikiCategory::class)->middleware(['auth', 'permissions.admin-dashboard']);
    Route::get('/wiki/articles', WikiArticle::class)->middleware(['auth', 'permissions.admin-dashboard']);
    Route::prefix('guild')->middleware(['auth', 'permissions.view-guild'])->group(function () {
        Route::get('/{id}', [GuildController::class, 'index'])->name("dashboard.guild");
        Route::get('/{id}/settings', GuildSettings::class)->name("dashboard.guild.settings");
        Route::get('/{id}/events', Events::class)->name("dashboard.guild.events");
        Route::get('/{id}/events/{event_id}', ViewEvent::class)->name("dashboard.guild.view-event");
        Route::get('/{id}/lobby/{lobby_id}', LobbyController::class)->name("dashboard.lobby");
    });
});


// UPLOADING
Route::post('/upload-image', [ImageUploadController::class, 'upload'])->name('upload.image');

Route::view("/websocket/test", "websocket");

Route::get("/websocket", function () {
    event(new \App\Events\StaffChatEvent("test", Auth::user()));
    return null;
});

