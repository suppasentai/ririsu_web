<?php

use Illuminate\Database\Seeder;

class GradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = ['5th grade', '6th grade', '7th grade', '8th & 9th grade', '10th to 12th grade', 'College', 'College graduate'];
        foreach ($titles as $key => $value) {
            DB::table('grades')->insert([
                'title' => $value,
                'description' => NULL,
                'image' => NULL,
            ]);
        }
    }
}
