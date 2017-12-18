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
            'status'        => 'active',
            'password'      => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'name'          => 'Admin',
            'firstname'     => 'Main',
            'lastname'      => 'Admin',
            'email'         => 'admin@gmail.com',
            'username'      => 'admin',
            'status'        => 'active',
            'password'      => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'name'          => 'Main Encoder',
            'firstname'     => 'Main',
            'lastname'      => 'Encoder',
            'email'         => 'encoder@gmail.com',
            'username'      => 'encoder',
            'status'        => 'active',
            'password'      => bcrypt('password'),
        ]);
    }
}
