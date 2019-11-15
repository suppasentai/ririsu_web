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
            'user_id' => '1',
            'slug' => uniqid()
        ]);
        $release1->tags()->attach($admin);
    }
    // $table->bigIncrements('id');
    // $table->string('title');
    // $table->text('description')->nullable();
    // $table->text('image')->nullable();
    // $table->text('url_video')->nullable();
    // $table->date('date')->nullable();
    // $table->integer('page_views')->default(0);
    // $table->tinyInteger('status')->unsigned()->default(ReleaseStatus::Pending);
    // $table->integer('user_id')->index();
    // $table->string('category_ref')->nullable();
    // $table->string('grade_ref')->nullable();
    // $table->string('institution_ref')->nullable();
    // $table->timestamps();
}
