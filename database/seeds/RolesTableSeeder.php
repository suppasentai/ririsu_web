<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $editor = Role::create([
            'name' => 'Editor', 
            'slug' => 'editor',
            'permissions' => [
                'release.publish' => true,
                'release.update' => true,
                'release.create' => true,
                'release.draft' => true,
                'tag' => true
            ]
        ]);
        $journalist = Role::create([
            'name' => 'Journalist', 
            'slug' => 'journalist',
            'permissions' => [
                'release.create' => true,
                'release.draft' => true
            ]
        ]);
        $client = Role::create([
            'name' => 'Client', 
            'slug' => 'client',
            'permissions' => [
                'release.form' => true
            ]
        ]);
        $customer = Role::create([
            'name' => 'Customer', 
            'slug' => 'customer',
            'permissions' => [
            ]
        ]);
    }
}
