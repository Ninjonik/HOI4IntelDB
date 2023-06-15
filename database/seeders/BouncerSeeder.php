<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Bouncer;
use Illuminate\Database\Seeder;

class BouncerSeeder extends Seeder
{
    public function run()
    {

        # to update:
        # php artisan db:seed --class=BouncerSeeder

        /* ROLES */
        $admin = Bouncer::role()->firstOrCreate([
            'name' => 'admin',
            'title' => 'Administrator',
        ]);
        $mod = Bouncer::role()->firstOrCreate([
            'name' => 'mod',
            'title' => 'Moderator',
        ]);
        $verified_host = Bouncer::role()->firstOrCreate([
            'name' => 'verified_host',
            'title' => 'Verified Host',
        ]);
        $host = Bouncer::role()->firstOrCreate([
            'name' => 'host',
            'title' => 'Host',
        ]);
        /* END OF ROLES */

        /* START OF ABILITIES */
        $view_dashboard = Bouncer::ability()->firstOrCreate([
            'name' => 'view-dashboard',
            'title' => 'View dashboard',
        ]);
        $admin_dashboard = Bouncer::ability()->firstOrCreate([
            'name' => 'admin-dashboard',
            'title' => 'View admin dashboard',
        ]);
        $ban = Bouncer::ability()->firstOrCreate([
            'name' => 'ban',
            'title' => 'Ban',
        ]);
        $delete = Bouncer::ability()->firstOrCreate([
            'name' => 'delete',
            'title' => 'Delete',
        ]);
        /* END OF ABILITIES */

        /* SETTING THE PERMISSIONS */
        #ADMIN
        Bouncer::allow($admin)->to($view_dashboard);
        Bouncer::allow($admin)->to($admin_dashboard);
        Bouncer::allow($verified_host)->to($ban);
        Bouncer::allow($verified_host)->to($delete);
        #MOD
        Bouncer::allow($mod)->to($view_dashboard);
        Bouncer::allow($admin)->to($admin_dashboard);
        Bouncer::allow($verified_host)->to($ban);
        Bouncer::allow($verified_host)->to($delete);
        #VERIFIED HOST
        Bouncer::allow($verified_host)->to($view_dashboard);
        Bouncer::allow($verified_host)->to($ban);
        #HOST
        Bouncer::allow($host)->to($view_dashboard);
        /* END OF SETTING THE PERMISSIONS */
    }
}
