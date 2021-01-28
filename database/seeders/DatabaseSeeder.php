<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        $this->call(UserAdminSeeder::class);
        \App\Models\Setting::factory(1)->create();
        \App\Models\Story::factory(10)->create();
    }
}
