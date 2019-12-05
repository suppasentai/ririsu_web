<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(IndustriesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(GradesTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(ReleasesTableSeeder::class);
    }
}
