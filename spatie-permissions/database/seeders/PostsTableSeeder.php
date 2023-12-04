<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Post::truncate();

        Post::create([
            'user_id'   => 1,
            'title'     => 'Sample Post 1',
            'body'      => 'This is the body of the first sample post.',
            'published' => true,
        ]);

        Post::create([
            'user_id'   => 1,
            'title'     => 'Sample Post 2',
            'body'      => 'This is the body of the second sample post.',
            'published' => true,
        ]);
    }
}
