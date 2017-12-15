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
            'name'          => 'Super Admin',
            'firstname'     => 'Super',
            'lastname'      => 'Admin',
            'email'         => 'superadmin@gmail.com',
            'username'      => 'super-admin',
            'employee_no'   => '000000000',
            'sss_no'        => '000000000',
            'status'        => 'active',
            'password'      => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'name'          => 'Admin',
            'firstname'     => 'Main',
            'lastname'      => 'Admin',
            'email'         => 'admin@gmail.com',
            'username'      => 'admin',
            'employee_no'   => '000000001',
            'sss_no'        => '000000001',
            'status'        => 'active',
            'password'      => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'name'          => 'Main Encoder',
            'firstname'     => 'Main',
            'lastname'      => 'Encoder',
            'email'         => 'encoder@gmail.com',
            'username'      => 'encoder',
            'employee_no'   => '000000002',
            'sss_no'        => '000000003',
            'status'        => 'active',
            'password'      => bcrypt('password'),
        ]);
    }
}
