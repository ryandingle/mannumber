<?php

use Illuminate\Database\Seeder;

class User_permissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_permissions')->insert(

            [
                'permission_id' => '1',
                'user_id' 		=> '1',
                'status' 		=> 'active',
                'created_by' 	=> '1',
                'created_at' 	=> date('Y-m-d H:i:s'),
            ]
        );

        DB::table('user_permissions')->insert(

            [
                'permission_id' => '2',
                'user_id' 		=> '1',
                'status' 		=> 'active',
                'created_by' 	=> '1',
                'created_at' 	=> date('Y-m-d H:i:s'),
            ]
        );

        DB::table('user_permissions')->insert(
            [
                'permission_id' => '3',
                'user_id' 		=> '1',
                'status' 		=> 'active',
                'created_by' 	=> '1',
                'created_at' 	=> date('Y-m-d H:i:s'),
            ]
        );

        DB::table('user_permissions')->insert(
            [
                'permission_id' => '4',
                'user_id' 		=> '1',
                'status' 		=> 'active',
                'created_by' 	=> '1',
                'created_at' 	=> date('Y-m-d H:i:s'),
            ]
        );

        DB::table('user_permissions')->insert(

            [
                'permission_id' => '1',
                'user_id' 		=> '2',
                'status' 		=> 'active',
                'created_by' 	=> '1',
                'created_at' 	=> date('Y-m-d H:i:s'),
            ]
        );

        DB::table('user_permissions')->insert(
            [
                'permission_id' => '2',
                'user_id' 		=> '2',
                'status' 		=> 'active',
                'created_by' 	=> '1',
                'created_at' 	=> date('Y-m-d H:i:s'),
            ]
        );

        DB::table('user_permissions')->insert(
            [
                'permission_id' => '3',
                'user_id' 		=> '2',
                'status' 		=> 'active',
                'created_by' 	=> '1',
                'created_at' 	=> date('Y-m-d H:i:s'),
            ]
        );

        DB::table('user_permissions')->insert(
            [
                'permission_id' => '1',
                'user_id' 		=> '3',
                'status' 		=> 'active',
                'created_by' 	=> '1',
                'created_at' 	=> date('Y-m-d H:i:s'),
            ]
        );

        DB::table('user_permissions')->insert(
            [
                'permission_id' => '2',
                'user_id' 		=> '3',
                'status' 		=> 'active',
                'created_by' 	=> '1',
                'created_at' 	=> date('Y-m-d H:i:s'),
            ]
        );

        DB::table('user_permissions')->insert(
            [
                'permission_id' => '3',
                'user_id' 		=> '3',
                'status' 		=> 'active',
                'created_by' 	=> '1',
                'created_at' 	=> date('Y-m-d H:i:s'),
            ]
        );
    }
}
