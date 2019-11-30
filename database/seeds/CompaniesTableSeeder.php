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
        $titles = ['Anor', 'Woodland Realm', 'Durins Folk', 'Gondor'];
        $representative_names = ['Aragon', 'Legolas', 'Gimli', 'Boromir'];
        $locations = ['Rivendell', 'Woodland Realm', 'Blue Mountains', 'Gondor'];
        $indents = ['Aragon123', 'Legolas321', 'Gimli132', 'Boromir213'];
        $emails = ['aragon123@gmail.com', 'legolas321@gmail.com', 'gimli132@gmail.com', 'boromir213@gmail.com'];
        for ($i =0; $i<4; $i++) {
            DB::table('companies')->insert([
                'title' => $titles[$i],
                'representative_name' => $representative_names[$i],
                'tel' => NULL,
                'capital_stock'=> NULL,
                'employees_number' => NULL,
                'url' => NULL,
                'incorp_date' => NULL,
                'tel' => $faker->phoneNumber,
                'location' => $locations[$i],
                'identification_code' => $indents[$i],
                'email' => $emails[$i]
            ]);
        }
    }
}