<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i =0; $i<100; $i++) {
            DB::table('companies')->insert([
                'title' => $faker->company,
                'image' => null,
                'representative_name' => $faker->name(),
                'capital_stock'=> rand(100000, 1000000),
                'employees_number' => rand(10, 100),
                'url' => $faker->url,
                'incorp_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'tel' => $faker->phoneNumber,
                'location' => $faker->address,
                'identification_code' => $faker->unique()->ean8,
                'email' => $faker->safeEmail,
                'industry_ref' => DB::table('industries')->inRandomOrder()->first()->title,
                'verified' => true,
            ]);
        }
    }
}