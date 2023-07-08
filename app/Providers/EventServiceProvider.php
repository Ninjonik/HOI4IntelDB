<?php

namespace App\Providers;

use App\Models\Settings;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Bouncer;
use SocialiteProviders\Discord\DiscordExtendSocialite;
use SocialiteProviders\Manager\SocialiteWasCalled;
use SocialiteProviders\Steam\SteamExtendSocialite;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        \SocialiteProviders\Manager\SocialiteWasCalled::class => [
            \SocialiteProviders\Discord\DiscordExtendSocialite::class.'@handle',
            \SocialiteProviders\Steam\SteamExtendSocialite::class.'@handle',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen(BuildingMenu::class, function (BuildingMenu $event) {
            $user = User::find(Auth::user()->id);

            if ($user->guilds) {
                $guilds = json_decode($user->guilds);
                $guildsData = Settings::whereIn('id', $guilds)->get();

                $event->menu->add('My servers');

                foreach ($guildsData as $guildData) {
                    $event->menu->add([
                        'text'    => $guildData->guild_name,
                        'icon'    => 'fas fa-fw fa-share',
                        'submenu' => [
                            [
                                'text' => 'Statistics',
                                'url'  => route('dashboard.guild', ['id' => $guildData->id]),
                            ],
                            [
                                'text' => 'Settings',
                                'url'  => route('dashboard.guild.settings', ['id' => $guildData->id]),
                            ],
                        ],
                    ]);
                }
            }

            if (Bouncer::can("admin-dashboard")) {
                $event->menu->add('Administration');
                $event->menu->add([
                    'text' => 'Statistics',
                    'url'  => '/dashboard/administration',
                    'icon' => 'fas fa-fw fa-file',
                ]);
                $event->menu->add([
                    'text' => 'Guilds',
                    'url'  => '/dashboard/guilds',
                    'icon' => 'fas fa-fw fa-cog',
                ]);
                $event->menu->add([
                    'text' => 'Users',
                    'url'  => '/dashboard/users',
                    'icon' => 'fas fa-fw fa-user',
                ]);
                $event->menu->add([
                    'text'    => 'Wiki',
                    'icon'    => 'fas fa-fw fa-share',
                    'submenu' => [
                        [
                            'text' => 'Categories',
                            'url'  => '/dashboard/wiki/categories',
                        ],
                        [
                            'text' => 'Articles',
                            'url'  => '/dashboard/wiki/articles',
                        ],
                    ],
                ]);
            }
        });

    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
