<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;
use App\Models\Blog;

class BlogsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $user1 = User::find(1);
        $user2 = User::find(2);

        for ($i = 1; $i <= 50; $i++) {
            Blog::create([
                'user_id' => ($i % 2 === 0) ? $user1->id : $user2->id,
                'title' => $faker->sentence(),
                'content' => $faker->paragraphs(20, true),
            ]);
        }
    }
}
