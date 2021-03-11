<?php

namespace Database\Factories;

use App\Models\Post as Post;
use App\Models\User as User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph(8),
            'published_at' => $this->faker->date('Y-m-d')
        ];
    }
}
