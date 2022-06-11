<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (!User::where('email', 'test@gmail.com')->exists()) {
            User::create([
                'name' => 'Head Teacher',
                'email' => 'test@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('12345678'),
                'role' => 'Admin',
                'status' => 'active'
            ]);
        }
        User::create([
            'name' => 'Teacher',
            'email' => 'teacher@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('12345678'),
            'role' => 'User',
            'status' => 'inactive'
        ]);
        $this->call(SettingSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
