<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::where('slug', 'editor')->first();
        $user1 = User::create([
            'name' => Str::random(10),
            'slug' => uniqid(),
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
        $user1->roles()->attach($admin);
    }
}
