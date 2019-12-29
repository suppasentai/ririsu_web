<?php

use Illuminate\Database\Seeder;

class IndustriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = ['Fisheries / Agriculture / Forestry', 'Mining', 'Construction', 'Manufacturing', 'Electricity & Gas', 'Warehouse / Transportation',
                    'Telecommunications', 'Commercial (wholesale, retail)', 'Finance / Insurance', 'Real Estate Business', 'Restaurant / Accommodation', 'Medical / Welfare',
                    'Education', 'Government & Local Government', 'Foundation/ Association/ Religious Corp.'];
        foreach ($titles as $key => $value) {
            DB::table('industries')->insert([
                'title' => $value,
                'description' => NULL,
                'image' => "images/industries_images/".($key+1).".png",
            ]);
        }
    }
}
