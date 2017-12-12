<?php

use Illuminate\Database\Seeder;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modules')->insert([
            'title' 		=> 'Dashboard',
            'prefix' 		=> 'dashboard',
            'description' 	=> 'Dashboard Module',
            'icon' 			=> 'fa-dashboard',
            'sort_order' 	=> '0',
            'status' 		=> 'active',
            'created_by' 	=> '1',
            'created_at' 	=> date(now()),
        ]);

        DB::table('modules')->insert([
            'title'         => 'Request',
            'prefix'        => 'request',
            'description'   => 'Request Module',
            'icon'          => 'fa-send',
            'sort_order'    => '1',
            'status'        => 'active',
            'created_by'    => '1',
            'created_at'    => date(now()),
        ]);

        DB::table('modules')->insert([
            'title'         => 'User Management',
            'prefix'        => 'user',
            'description'   => 'User Management Module',
            'icon'          => 'fa-users',
            'sort_order'    => '2',
            'status'        => 'active',
            'created_by'    => '1',
            'created_at'    => date(now()),
        ]);

        DB::table('modules')->insert([
            'title'         => 'Roles',
            'prefix'        => 'role',
            'description'   => 'Roles Module',
            'icon'          => 'fa-circle-o',
            'sort_order'    => '3',
            'status'        => 'active',
            'created_by'    => '1',
            'created_at'    => date(now()),
        ]);

        DB::table('modules')->insert([
            'title'         => 'Permissions',
            'prefix'        => 'permission',
            'description'   => 'Permissons Module',
            'icon'          => 'fa-circle-o',
            'sort_order'    => '4',
            'status'        => 'active',
            'created_by'    => '1',
            'created_at'    => date(now()),
        ]);

        DB::table('modules')->insert([
            'title'         => 'Modules',
            'prefix'        => 'module',
            'description'   => 'Modules Module Management',
            'icon'          => 'fa-circle-o',
            'sort_order'    => '5',
            'status'        => 'active',
            'created_by'    => '1',
            'created_at'    => date(now()),
        ]);

        DB::table('modules')->insert([
            'title'         => 'Account',
            'prefix'        => 'account',
            'description'   => 'Account Module',
            'icon'          => 'fa-user',
            'sort_order'    => '100',
            'status'        => 'active',
            'created_by'    => '1',
            'created_at'    => date(now()),
        ]);
    }
}
