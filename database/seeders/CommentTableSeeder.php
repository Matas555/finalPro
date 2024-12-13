<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure there are users and posts in the database
        if (User::count() === 0 || Post::count() === 0) {
            $this->command->warn("Skipping Comment seeding: No users or posts found.");
            return;
        }

        // Manually create one specific comment
        $user = User::all()->random(); 
        $post = Post::all()->random(); 

        $c = new Comment;
        $c->commenting = 'Wow, great work!';
        $c->post_id = $post->id;
        $c->user_id = $user->id;
        $c->save();

        // Generate additional comments with factories
        Comment::factory()->count(10)->create();
    }
}


