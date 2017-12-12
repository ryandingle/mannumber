<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' 			=> 'Super Admin',
            'firstname' 	=> 'Super',
            'lastname' 		=> 'Admin',
            'email' 		=> 'superadmin@gmail.com',
            'username' 		=> 'admin',
            'employee_no' 	=> '000000000',
            'sss_no' 		=> '000000000',
            'status'        => 'active',
            'password' 		=> bcrypt('password'),
        ]);
    }
}
