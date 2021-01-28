<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => 'Qkutu',
            "email" => 'demo@qkutu.com',
            "password" => bcrypt('password'),
            "email_verified_at" => Carbon::now(),
        ]);
    }
}
