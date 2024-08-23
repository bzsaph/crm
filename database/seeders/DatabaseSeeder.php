<?php

use Database\Seeders\UserSeeder;
use Database\Seeders\Roleseeder;
use Database\Seeders\Permissionseeder;
use Database\Seeders\Giveparmission;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
        
            UserSeeder::class,
            Roleseeder::class,
            PermissionSeeder::class,
            Giveparmission::class,
            // Add more seeders as needed
        ]);
    }
}
