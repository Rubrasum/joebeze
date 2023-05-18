<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Joe Betbeze',
            'email' => 'josephbetbeze@gmail.com',
            'admin' => true,
        ]);

        Post::factory(15)->create([
            'user_id' => $user->id
        ]);
    }
}
