<?php

use Illuminate\Database\Seeder;
use App\Release;
use App\Tag;
use App\Category;
use App\Company;
use Faker\Factory as Faker;
use App\Enums\ReleaseStatus;

class ReleasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(Company::all() as $company){
            for($i = 1; $i<= 3; $i++){
                $category = Category::all()->random();
                $tag = Tag::all()->random(3);
                $release1 = Release::create([
                    'image' => '/upload/blog/s'.(($i%40)+1).'.jpg',
                    'title' => $faker->realText($maxNbChars = 30, $indexSize = 2), 
                    'slug' => uniqid(),
                    'category_ref' =>  $category->title,
                    'user_id' =>  '1',
                    'description' => $faker->realText($maxNbChars = 5000, $indexSize = 3),
                    'note' => $faker->realText($maxNbChars = 200, $indexSize = 2),
                    'company_id' => $company->id,
                    'category_id' => $category->id,
                    'status' => ReleaseStatus::Published,
                ]);
                $release1->tags()->attach($tag);
            }
        }
        
    }
}
