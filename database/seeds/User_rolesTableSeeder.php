<?php

use Illuminate\Database\Seeder;

class User_rolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_roles')->insert([
                'role_id' 		=> '1',
                'user_id' 		=> '1',
                'status' 		=> 'active',
                'created_by' 	=> '1',
                'created_at' 	=> date('Y-m-d H:i:s'),
        ]);

        DB::table('user_roles')->insert([
               	'role_id' 		=> '2',
                'user_id' 		=> '2',
                'status' 		=> 'active',
                'created_by' 	=> '1',
                'created_at' 	=> date('Y-m-d H:i:s'),
        ]);

        DB::table('user_roles')->insert([
                'role_id' 		=> '3',
                'user_id' 		=> '3',
                'status' 		=> 'active',
                'created_by' 	=> '1',
                'created_at' 	=> date('Y-m-d H:i:s'),
       ]);
    }
}
