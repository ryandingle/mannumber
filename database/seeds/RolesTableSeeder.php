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
        DB::table('roles')->insert([
            'title' 		=> 'Super Admin',
            'prefix' 		=> 'super-admin',
            'description' 	=> 'Super Admin Role',
            'created_by' 	=> '1',
            'created_at' 	=> date('Y-m-d H:i:s'),
        ]);

        DB::table('roles')->insert([
            'title'         => 'Admin',
            'prefix'        => 'admin',
            'description'   => 'Admin Role',
            'created_by'    => '1',
            'created_at' 	=> date('Y-m-d H:i:s'),
        ]);

        DB::table('roles')->insert([
            'title'         => 'Encoder',
            'prefix'        => 'encoder',
            'description'   => 'Encoder Role',
            'created_by'    => '2',
            'created_at' 	=> date('Y-m-d H:i:s'),
        ]);
    }
}
