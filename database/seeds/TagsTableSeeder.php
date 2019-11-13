<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = ['Food', 'Beauty', 'Fashion', 'Travel', 'Music', 'World',
        'Winter Olympic 2020', 'Game', 'Football', 'AI', 'Reiwa',
        'Movie', 'Hollywood', 'World Cup 2020', 'Apple', 'Microsoft',
        'Instagram', 'Car', 'Motor', 'Love', 'Café', 'Premier League',
        'La Liga', 'Cancer', 'Construction', 'Cat Linh - Ha Dong Railway',
        'Wedding', 'MLB', 'Christmas', 'Santa Clause', 'Bolivia', 'Manga',
        'Anime', 'Comics', 'Wine', 'Chocolate', 'Hong Kong', 'Forest fires',
        'Amazon', 'Sony', 'Android', 'Education', 'Inbound', 'Scuba diving',
        'Thailand', 'Vietnam', 'UK'];
        foreach ($titles as $key => $value) {
            DB::table('tags')->insert([
                'title' => $value,
                'description' => NULL,
                'image' => NULL,
            ]);
        }
    }
}
