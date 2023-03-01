<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run()
    {

        Post::factory()->count(10)->create();

        /* Post::create([ // Qolda yozilishi
            'user_id' => 1, // User yoq ligi uchun
            'title' => Str::random(10),
            'short_content' => Str::random(15),
            'content' => Str::random(30),
            'photo' => null,
        ]);

        Post::create([
            'user_id' => 1, // User yoq ligi uchun
            'title' => Str::random(10),
            'short_content' => Str::random(15),
            'content' => Str::random(30),
            'photo' => null,
        ]); */

        // \App\Models\Post::factory(10)->create();
        // \App\Models\Post::factory(10)->unverified()->create();
        // \App\Models\Post::factory(10)->make(); // MO tushmaydi
    }
}
