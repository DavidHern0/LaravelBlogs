<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;
use App\Models\Blog;

class BlogsTableSeeder extends Seeder
{

    private $faker;

    public function __construct()
    {
        $this->faker = Faker::create();
    }

    private function generateContent()
    {
        $randomParagraph = '<p>' . $this->faker->paragraphs(rand(1, 3), true) . '</p>';
        $randomBold = '<b>' . $this->faker->text(30) . '</b>';
        $randomParagraphWithBold = '<p>' . $this->faker->paragraphs(1, true) ." ". $randomBold ." ". $this->faker->paragraphs(1, true) . '</p>';
        $randomImage = '<img src="' . $this->faker->imageUrl($width = 320, $height = 240) . '" /> <br>';

        $randomElements = [$randomParagraph, $randomParagraphWithBold, $randomBold, $randomImage];

        shuffle($randomElements);

        return implode('', $randomElements);
    }

    public function run()
    {
        $user1 = User::find(1);
        $user2 = User::find(2);

        for ($i = 1; $i <= 50; $i++) {
            Blog::create([
                'user_id' => ($i % 2 === 0) ? $user1->id : $user2->id,
                'title' => $this->faker->sentence(),
                'content' => $this->generateContent(),
            ]);
        }
    }
}
