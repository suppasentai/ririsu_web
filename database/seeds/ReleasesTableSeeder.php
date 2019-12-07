<?php

use Illuminate\Database\Seeder;
use App\Release;
use App\Tag;
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
        $titles = ['Tech', 'Politic', 'Business', 'Education', 'Fashion', 'Sport'];
        $faker = Faker::create();
        for($i = 1; $i<= 40; $i++){
            $cat = $titles[array_rand($titles)];
            $release1 = Release::create([
                'image' => '/upload/blog/s'.$i.'.jpg',
                'title' => 'test', 
                'slug' => uniqid(),
                'category_ref' =>  $cat,
                'user_id' =>  '1',
                'description' => $faker->realText($maxNbChars = 5000, $indexSize = 3),
                'note' => $faker->realText($maxNbChars = 200, $indexSize = 2),
                'company_id' => ($i%4)+1,
            ]);
            $tag = Tag::all()->random();
            $release1->tags()->attach($tag);
        }
        
    }
}
