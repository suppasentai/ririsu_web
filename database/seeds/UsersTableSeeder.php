<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => Str::random(10),
            'first_name' => 'Frodo',
            'last_name' => 'Baggins',
            'grade' => '5th grade',
            'institution_ref' => 'Central',
            'image' => NULL,
            'identification_document' => 1193373386,
            'telephone' => 3194995422,
            'address' => 'Calle 11 # 13 - 31 Belén, La Unión, Valle del Cauca, Colombia',
            'email' => 'sonduc2210@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
