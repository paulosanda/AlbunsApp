<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\User::create([
            'is_admin' => true,
            'name' => 'admin',
            'email' => 'admin@admin',
            'password' => \Hash::make('123456'),
        ]);

        \App\Models\User::create([
            'name' => 'user',
            'email' => 'user@user',
            'password' => \Hash::make('123456'),
        ]);
    }
}
