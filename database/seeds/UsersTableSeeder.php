<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use App\Company;

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
            'institution_id' => NULL,
            'image' => NULL,
            'identification_document' => 1193373386,
            'telephone' => 3194995422,
            'address' => 'Calle 11 # 13 - 31 Belén, La Unión, Valle del Cauca, Colombia',
            'email' => 'sonduc2210@gmail.com',
            'password' => bcrypt('secret'),
            'active' => true
        ]);
        $user1->roles()->attach($admin);

        $author = Role::where('slug', 'journalist')->first();
        $user2 = User::create([
            'name' => Str::random(10),
            'slug' => uniqid(),
            'first_name' => 'Samwise',
            'last_name' => 'Gamgee',
            'institution_id' => 'Central',
            'image' => NULL,
            'identification_document' => 1193373387,
            'telephone' => 3194995423,
            'address' => 'Calle 12 # 13 - 31 Belén, La Unión, Valle del Cauca, Colombia',
            'email' => 'caoduc2210@gmail.com',
            'password' => bcrypt('secret'),
            'active' => true
        ]);
        $user2->roles()->attach($author);
        $faker = Faker\Factory::create();
        for($i=0; $i<200; $i++){
            $user = User::create([
                // 'name' => Str::random(10),
                'slug' => uniqid(),
                'first_name' => $faker->firstName(),
                'last_name' => $faker->lastName,
                // 'institution_id' => 'Central',
                // 'image' => NULL,
                // 'identification_document' => 1193373387,
                'telephone' => $faker->phoneNumber,
                // 'address' => 'Calle 12 # 13 - 31 Belén, La Unión, Valle del Cauca, Colombia',
                'email' => $faker->safeEmail,
                'password' => bcrypt('secret'),
            ]);
            $companies = Company::all()->random(rand(6,10));
            // $user->follow($companies);
            foreach($companies as $company){
                $user->follow($company);
            }
        }
        // $user->first_name = $request->first_name;
        // $user->last_name = $request->last_name;
        // $user->telephone = $request->telephone;
        // $user->email = $request->user_email;
        // $user->password = Hash::make($request->password);
        // $user->slug = uniqid();
    }
}
