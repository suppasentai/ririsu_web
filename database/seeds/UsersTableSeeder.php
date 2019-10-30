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
            'first-name' => Str::random(10),
            'last-name' => Str::random(10),
            'name' => Str::random(10),
            'email' => 'sonduc2210@gmail.com',
            'password' => bcrypt('3415375639'),
        ]);
    }
}
