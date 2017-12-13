<?php

use Illuminate\Database\Seeder;

class User_modulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_modules')->insert(
        	/*super admin*/
            [
                'module_id' 	=> '1',
                'user_id' 		=> '1',
                'status' 		=> 'active',
                'created_by' 	=> '1',
                'created_at' 	=> date(now()),
            ]
        );

        DB::table('user_modules')->insert(
            [
                'module_id' 	=> '2',
                'user_id' 		=> '1',
                'status' 		=> 'active',
                'created_by' 	=> '1',
                'created_at' 	=> date(now()),
            ]
        );

        DB::table('user_modules')->insert(
            [
                'module_id' 	=> '3',
                'user_id' 		=> '1',
                'status' 		=> 'active',
                'created_by' 	=> '1',
                'created_at' 	=> date(now()),
            ]
        );

        DB::table('user_modules')->insert(
            [
                'module_id' 	=> '4',
                'user_id' 		=> '1',
                'status' 		=> 'active',
                'created_by' 	=> '1',
                'created_at' 	=> date(now()),
            ]
        );

        DB::table('user_modules')->insert(
            [
                'module_id' 	=> '5',
                'user_id' 		=> '1',
                'status' 		=> 'active',
                'created_by' 	=> '1',
                'created_at' 	=> date(now()),
            ]
        );

        DB::table('user_modules')->insert(
            [
                'module_id' 	=> '6',
                'user_id' 		=> '1',
                'status' 		=> 'active',
                'created_by' 	=> '1',
                'created_at' 	=> date(now()),
            ]
        );

        DB::table('user_modules')->insert(
            [
                'module_id' 	=> '7',
                'user_id' 		=> '1',
                'status' 		=> 'active',
                'created_by' 	=> '1',
                'created_at' 	=> date(now()),
            ]
        );

        DB::table('user_modules')->insert(
            [
                'module_id'     => '8',
                'user_id'       => '1',
                'status'        => 'active',
                'created_by'    => '1',
                'created_at'    => date(now()),
            ]
        );

        DB::table('user_modules')->insert(
            /*admin*/
            [
                'module_id' 	=> '1',
                'user_id' 		=> '2',
                'status' 		=> 'active',
                'created_by' 	=> '1',
                'created_at' 	=> date(now()),
            ]
        );

        DB::table('user_modules')->insert(
            [
                'module_id' 	=> '2',
                'user_id' 		=> '2',
                'status' 		=> 'active',
                'created_by' 	=> '1',
                'created_at' 	=> date(now()),
            ]
        );

        DB::table('user_modules')->insert(
            [
                'module_id' 	=> '3',
                'user_id' 		=> '2',
                'status' 		=> 'active',
                'created_by' 	=> '1',
                'created_at' 	=> date(now()),
            ]
        );

        DB::table('user_modules')->insert(
            [
                'module_id'	 	=> '4',
                'user_id' 		=> '2',
                'status' 		=> 'active',
                'created_by' 	=> '1',
                'created_at' 	=> date(now()),
            ]
        );

        DB::table('user_modules')->insert(
            [
                'module_id' 	=> '5',
                'user_id' 		=> '2',
                'status' 		=> 'active',
                'created_by' 	=> '1',
                'created_at' 	=> date(now()),
            ]
        );

        DB::table('user_modules')->insert(
            [
                'module_id' 	=> '6',
                'user_id' 		=> '2',
                'status' 		=> 'active',
                'created_by' 	=> '1',
                'created_at' 	=> date(now()),
            ]
        );

        DB::table('user_modules')->insert(
            [
                'module_id' 	=> '7',
                'user_id' 		=> '2',
                'status' 		=> 'active',
                'created_by' 	=> '1',
                'created_at' 	=> date(now()),
            ]
        );

        DB::table('user_modules')->insert(
            [
                'module_id'     => '8',
                'user_id'       => '2',
                'status'        => 'active',
                'created_by'    => '1',
                'created_at'    => date(now()),
            ]
        );

        DB::table('user_modules')->insert(

            /*encoder*/
            [
                'module_id' 	=> '1',
                'user_id' 		=> '3',
                'status' 		=> 'active',
                'created_by' 	=> '1',
                'created_at' 	=> date(now()),
            ]
        );

        DB::table('user_modules')->insert(
            [
                'module_id' 	=> '2',
                'user_id' 		=> '3',
                'status' 		=> 'active',
                'created_by' 	=> '1',
                'created_at' 	=> date(now()),
            ]
        );

        DB::table('user_modules')->insert(
            [
                'module_id' 	=> '8',
                'user_id' 		=> '3',
                'status' 		=> 'active',
                'created_by' 	=> '1',
                'created_at' 	=> date(now()),
            ]
        );
    }
}
