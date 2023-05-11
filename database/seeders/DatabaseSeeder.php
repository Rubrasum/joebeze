<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = \App\Models\User::factory()->create([
            'name' => 'Joe Betbeze',
            'email' => 'josephbetbeze@gmail.com',
        ]);

        Post::factory(15)->create([
            'user_id' => $user->id
        ]);
    }
}
