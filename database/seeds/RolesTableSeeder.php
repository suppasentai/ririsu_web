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
                'release.draft' => true,
                'admin' => true,
                'system' => true,
            ]
        ]);
        $journalist = Role::create([
            'name' => 'Company', 
            'slug' => 'company',
            'permissions' => [
                'release.create' => true,
                'release.draft' => true,
                'release.update' => true,
                'system' => true,
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
