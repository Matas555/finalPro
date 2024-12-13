<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::firstOrCreate([
            'email' => 'test@example.com',
        ], [
            'name' => 'Test User',
            'password' => bcrypt('password'), 
        ]);

        $p = new Post;
        $p->post_content = 'Underrated Artist';
        $p->song_id = 1;

        $user = User::all()->random();
        $p->user_id = $user->id; 
        $p->save();

        Post::factory()->count(5)->create([
            'user_id' => $user->id,
        ]);
    }
}
