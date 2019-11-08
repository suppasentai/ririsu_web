<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = ['Tech', 'Mobile', 'App', 'Entmt', 'Beauty', 'Fashion', 'Lifestyle', 'Business', 'Gourmet', 'Sports'];
        foreach ($titles as $key => $value) {
            DB::table('categories')->insert([
                'title' => $value,
                'description' => NULL,
                'image' => NULL,
            ]);
        }
    }
}

