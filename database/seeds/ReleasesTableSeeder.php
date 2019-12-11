<?php

use Illuminate\Database\Seeder;
use App\Release;
use App\Tag;
use App\Category;
use Faker\Factory as Faker;

class ReleasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = ['Tech', 'Politic', 'Business', 'Education', 'Lifestyle', 'Sport'];
        $faker = Faker::create();
        for($i = 1; $i<= 100; $i++){
            $cat = $titles[array_rand($titles)];
            $category = Category::all()->random();
            $release1 = Release::create([
                'image' => '/upload/blog/s'.(($i%40)+1).'.jpg',
                'title' => $faker->realText($maxNbChars = 30, $indexSize = 2), 
                'slug' => uniqid(),
                'category_ref' =>  $cat,
                'user_id' =>  '1',
                'description' => $faker->realText($maxNbChars = 5000, $indexSize = 3),
                'note' => $faker->realText($maxNbChars = 200, $indexSize = 2),
                'company_id' => ($i%4)+1,
                'category_id' => $category->id,
            ]);
            $tag = Tag::all()->random(3);
            $release1->tags()->attach($tag);
        }
        
    }
}
