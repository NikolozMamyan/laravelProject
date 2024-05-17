<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();
    
        for ($i = 0; $i < 10; $i++) {
            $title = $faker->sentence(mt_rand(3, 6), true);
            $content = $faker->paragraphs(mt_rand(3, 6), true);
            $category = $faker->word();
            $imageUrl = $faker->imageUrl(800, 400);
    
            Article::create([
                'title' => $title,
                'content' => $content,
                'category' => $category,
                'image' => $imageUrl,
            ]);
        }
    }
}
