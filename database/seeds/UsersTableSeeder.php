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
        // this should work, if not, separate them into separate DB::table() calls
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@aol.com',
                'password' => bcrypt('password')
            ],[
                'name' => 'user',
                'email' => 'user@aol.com',
                'password' => bcrypt('password')
            ],[
                'name' => 'user2',
                'email' => 'user2@aol.com',
                'password' => bcrypt('password')
            ]
        ]);
    }
}
