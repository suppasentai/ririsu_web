<?php

use Illuminate\Database\Seeder;

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
                'users.resource' => true,
                'orders.resource' => true,
            ]
        ]);
        $journalist = Role::create([
            'name' => 'Journalist', 
            'slug' => 'journalist',
            'permissions' => [
                'users.index' => true,
                'users.edit' => true,
                'orders.resource' => true,
            ]
        ]);
        $client = Role::create([
            'name' => 'Client', 
            'slug' => 'client',
            'permissions' => [
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
