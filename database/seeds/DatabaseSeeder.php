<?php

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
        // call seeders
        $this->call(UsersTableSeeder::class);
        $this->call(AppSettingsTableSeeder::class);
    }
}
