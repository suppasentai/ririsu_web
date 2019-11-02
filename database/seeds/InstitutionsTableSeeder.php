<?php

use Illuminate\Database\Seeder;

class InstitutionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = ['Company A', 'Company B', 'Organisation A', 'Organisation B'];
        foreach ($titles as $key => $value) {
            DB::table('institutions')->insert([
                'title' => $value,
                'description' => NULL,
                'image' => NULL,
            ]);
        }
    }
}
