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
        
        $admin = Tag::where('title', 'Game')->first();

        $release1 = Release::create([
            'title' => 'test', 
            'slug' => uniqid(),
            'category_ref' =>  'Tech',
            'user_id' =>  '1'
        ]);
        $release1->tags()->attach($admin);
    }
}
