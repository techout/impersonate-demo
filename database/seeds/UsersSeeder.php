<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'sadmin',
                'email' => 'sadmin@aol.com',
                'type_id' => '1',
                'password' => bcrypt('password')
            ],[
                'name' => 'admin',
                'email' => 'admin@aol.com',
                'type_id' => '2',
                'password' => bcrypt('password')
            ],[
                'name' => 'user',
                'email' => 'user@aol.com',
                'type_id' => '3',
                'password' => bcrypt('password')
            ],[
                'name' => 'user2',
                'email' => 'user2@aol.com',
                'type_id' => '3',
                'password' => bcrypt('password')
            ]
        ]);
    }
}
