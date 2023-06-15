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
use App\Http\Livewire\PlayersIndex;
use App\Http\Livewire\UsersIndex;
use App\Http\Livewire\WikiArticle;
use App\Http\Livewire\WikiCategory;
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
Route::redirect('/status', 'https://status.theorganization.eu')->name('status');
Route::get('/403', [LandingController::class, 'index']);
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
Route::get('auth/discord', [DiscordController::class, 'Redirect']);
Route::get('auth/discord/callback', [DiscordController::class, 'Callback']);
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

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
});


// UPLOADING
Route::post('/upload-image', [ImageUploadController::class, 'upload'])->name('upload.image');

Route::view("/websocket/test", "websocket");

Route::get("/websocket", function () {
    event(new \App\Events\StaffChatEvent("test", Auth::user()));
    return null;
});

