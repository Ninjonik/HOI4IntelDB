<?php

use App\Http\Controllers\DiscordController;
use App\Http\Controllers\GitHubController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PanelIndex;
use App\Http\Controllers\StaffChatController;
use App\Http\Controllers\SteamController;
use App\Http\Controllers\WikiIndexController;
use App\Http\Controllers\WikiCategoryController;
use App\Http\Controllers\WikiArticleController;
use App\Http\Controllers\WikiSearchController;
use App\Http\Livewire\GuildsComponent;
use App\Http\Livewire\WikiArticle;
use App\Http\Livewire\WikiCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use GuzzleHttp\Client;
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
Route::view('/test', "test");

Route::get('/wiki', [WikiIndexController::class, 'index'])->name('wiki');
Route::get('/wiki/category/{id}/{title}', [WikiCategoryController::class, 'show'])->name('wiki.category');
Route::get('/wiki/article/{id}/{title}', [WikiArticleController::class, 'show'])->name('wiki.article');
Route::post('/wiki/search', [WikiSearchController::class, 'show'])->name('wiki.search');



Route::get('auth/github', [GitHubController::class, 'gitRedirect']);
Route::get('auth/github/callback', [GitHubController::class, 'gitCallback']);
Route::get('steam/{id}', [SteamController::class, 'init']);
Route::get('auth/steam', [SteamController::class, 'redirect']);
Route::get('auth/steam/callback', [SteamController::class, 'callback']);
Route::get('auth/discord', [DiscordController::class, 'Redirect']);
Route::get('auth/discord/callback', [DiscordController::class, 'Callback']);

Route::get('/dashboard', [PanelIndex::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/dashboard/chat', [StaffChatController::class, 'index'])->middleware(['auth'])->name('dashboard/chat');
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});
Route::get('/dashboard/guilds', GuildsComponent::class);
Route::get('/dashboard/wiki/categories', WikiCategory::class);
Route::get('/dashboard/wiki/articles', WikiArticle::class);


Route::view("/websocket/test", "websocket");

Route::get("/websocket", function () {
    event(new \App\Events\StaffChatEvent("test", Auth::user()));
    return null;
});
Route::post("/dashboard/chat/send", function (Request $request) {
    $staffChatController = new StaffChatController;
    $staffChatController->store($request->message);
    return null;
});
Route::get("/steamtest", function(){

    $client = new Client();
    $response = $client->request('GET', 'https://api.steampowered.com/ISteamNews/GetNewsForApp/v0002/', [
        'query' => [
            'appid' => 394360,
            'count' => 3,
            'maxlength' => 30000,
            'format' => 'json',
            'key' => env("STEAM_CLIENT_SECRET"),
        ],
    ]);
    $news = json_decode($response->getBody(), true)['appnews']['newsitems'];
    dd($news);
});

// UPLOADING
Route::post('/upload-image', [ImageUploadController::class, 'upload'])->name('upload.image');

