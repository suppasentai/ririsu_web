<?php

use Illuminate\Database\Seeder;
use App\Release;
use App\Tag;

class ReleasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        
        for($i = 1; $i<= 40; $i++){
            $release1 = Release::create([
                'image' => '/upload/blog/s'.$i.'.jpg',
                'title' => 'test', 
                'slug' => uniqid(),
                'category_ref' =>  'Tech',
                'user_id' =>  '1'
            ]);
            $tag = Tag::all()->random();
            $release1->tags()->attach($tag);
        }
        
    }
}
