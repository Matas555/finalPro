<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'commenting' => fake()->sentence(),
            'post_id' => Post::all()->random()->id, // Random post
            'user_id' => User::all()->random()->id, // Random user
        ];
    }
}
