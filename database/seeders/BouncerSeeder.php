<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Bouncer;
use Illuminate\Database\Seeder;

class BouncerSeeder extends Seeder
{
    public function run()
    {
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
        /* END OF ABILITIES */

        /* SETTING THE PERMISSIONS */
        #ADMIN
        Bouncer::allow($admin)->to($view_dashboard);
        #MOD
        Bouncer::allow($mod)->to($view_dashboard);
        #VERIFIED HOST
        Bouncer::allow($verified_host)->to($view_dashboard);
        #HOST
        Bouncer::allow($host)->to($view_dashboard);
        /* END OF SETTING THE PERMISSIONS */
    }
}
